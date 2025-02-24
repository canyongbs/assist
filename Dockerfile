FROM serversideup/php:8.2-fpm-nginx-v2.2.1 AS web-serversideup

LABEL authors="Canyon GBS"
LABEL maintainer="Canyon GBS"

ARG POSTGRES_VERSION=15

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
    git \
    gnupg \
    php8.2-apcu \
    php8.2-imagick \
    php8.2-mailparse \
    php8.2-pcov \
    php8.2-pgsql \
    php8.2-redis \
    php8.2-xdebug \
    s6 \
    unzip \
    zip \
    && curl -sS https://www.postgresql.org/media/keys/ACCC4CF8.asc | gpg --dearmor | tee /etc/apt/keyrings/pgdg.gpg >/dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/pgdg.gpg] https://apt.postgresql.org/pub/repos/apt jammy-pgdg main" > /etc/apt/sources.list.d/pgdg.list \
    && apt-get update \
    && apt-get install -y --no-install-recommends postgresql-client-"$POSTGRES_VERSION" \
    && apt-get update \
    && apt-get upgrade -y \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

FROM serversideup/php:8.2-cli-v2.2.1 AS cli-serversideup

LABEL authors="Canyon GBS"
LABEL maintainer="Canyon GBS"

ARG POSTGRES_VERSION=15

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
    git \
    gnupg \
    php8.2-apcu \
    php8.2-imagick \
    php8.2-mailparse \
    php8.2-pcov \
    php8.2-pgsql \
    php8.2-redis \
    php8.2-xdebug \
    s6 \
    unzip \
    zip \
    && curl -sS https://www.postgresql.org/media/keys/ACCC4CF8.asc | gpg --dearmor | tee /etc/apt/keyrings/pgdg.gpg >/dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/pgdg.gpg] https://apt.postgresql.org/pub/repos/apt jammy-pgdg main" > /etc/apt/sources.list.d/pgdg.list \
    && apt-get update \
    && apt-get install -y --no-install-recommends postgresql-client-"$POSTGRES_VERSION" \
    && apt-get update \
    && apt-get upgrade -y \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

FROM web-serversideup AS web-base

ENV NVM_VERSION v0.40.1
ENV NODE_VERSION 23.4.0
ENV NPM_VERSION ^11.0.0
ENV NVM_DIR /usr/local/nvm
RUN mkdir "$NVM_DIR"

RUN curl -o- "https://raw.githubusercontent.com/nvm-sh/nvm/${NVM_VERSION}/install.sh" | bash

ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

RUN echo "source $NVM_DIR/nvm.sh \
    && nvm install $NODE_VERSION \
    && nvm alias default $NODE_VERSION \
    && nvm use default \
    && npm install -g npm@$NPM_VERSION" | bash

COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/nginx/site-opts.d /etc/nginx/site-opts.d

COPY --from=ghcr.io/roadrunner-server/roadrunner:2024.3.4 --chown=$PUID:$PGID --chmod=0755 /usr/bin/rr /usr/local/bin/rr

RUN rm -rf /etc/s6-overlay/s6-rc.d/laravel-automations
RUN rm /etc/s6-overlay/s6-rc.d/user/contents.d/laravel-automations
RUN rm /etc/s6-overlay/scripts/laravel-automations

RUN rm -rf /etc/s6-overlay/s6-rc.d/msmtp
RUN rm /etc/s6-overlay/s6-rc.d/user/contents.d/msmtp
RUN rm /etc/s6-overlay/scripts/msmtp

RUN rm -rf /etc/s6-overlay/s6-rc.d/php-fpm
RUN rm /etc/s6-overlay/s6-rc.d/user/contents.d/php-fpm

COPY --chmod=755 ./docker/web/s6-overlay/ /etc/s6-overlay/
COPY --chmod=755 ./docker/s6-overlay-shared /etc/s6-overlay

FROM web-base AS web-development

# Fix permission issues in development by setting the "webuser"
# user to the same user and group that is running docker.
COPY ./docker/set-id /set-id

ARG PUID
ARG PGID
RUN set-id webuser ${PUID} ${PGID} ; \
    rm /set-id

RUN chown -R "$PUID":"$PGID" /var/www/html \
    && chmod g+s -R /var/www/html

FROM web-base AS web-deploy

COPY --chown=$PUID:$PGID . /var/www/html

RUN npm ci --ignore-scripts \
    && rm -rf /var/www/html/vendor \
    && composer install --no-dev --no-interaction --no-progress --no-suggest --optimize-autoloader --apcu-autoloader \
    && npm run build \
    && npm ci --ignore-scripts --omit=dev

RUN chown -R "$PUID":"$PGID" /var/www/html \
    && chgrp "$PGID" /var/www/html/storage/logs \
    && chmod g+s /var/www/html/storage/logs \
    && find /var/www/html -type d -print0 | xargs -0 chmod 755 \
    && find /var/www/html \( -path /var/www/html/docker -o -path /var/www/html/node_modules -o -path /var/www/html/vendor \) -prune -o -type f -print0 | xargs -0 chmod 644 \
    && chmod -R ug+rwx /var/www/html/storage /var/www/html/bootstrap/cache

FROM cli-serversideup AS worker-base

ENV NVM_VERSION v0.40.1
ENV NODE_VERSION 23.4.0
ENV NPM_VERSION ^11.0.0
ENV NVM_DIR /usr/local/nvm
RUN mkdir "$NVM_DIR"

RUN curl -o- "https://raw.githubusercontent.com/nvm-sh/nvm/${NVM_VERSION}/install.sh" | bash

ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

RUN echo "source $NVM_DIR/nvm.sh \
    && nvm install $NODE_VERSION \
    && nvm alias default $NODE_VERSION \
    && nvm use default \
    && npm install -g npm@$NPM_VERSION" | bash

ARG TOTAL_QUEUE_WORKERS=3

COPY --chmod=755 ./docker/s6-overlay-shared/ /etc/s6-overlay/

COPY ./docker/worker/generate-queues.sh /generate-queues.sh
COPY ./docker/worker/templates/ /tmp/s6-overlay-templates
RUN chmod +x /generate-queues.sh

ENTRYPOINT ["/init"]

FROM worker-base AS worker-development

# Fix permission issues in development by setting the "webuser"
# user to the same user and group that is running docker.
COPY ./docker/set-id /set-id

ARG PUID
ARG PGID
RUN set-id webuser ${PUID} ${PGID} ; \
    rm /set-id

ARG MULTIPLE_DEVELOPMENT_QUEUES=false

RUN if [[ -z "$MULTIPLE_DEVELOPMENT_QUEUES" ]] ; then \
    /generate-queues.sh "default" "\$SQS_QUEUE" \
    && /generate-queues.sh "landlord" "\$LANDLORD_SQS_QUEUE" \
    && /generate-queues.sh "outbound-communication" "\$OUTBOUND_COMMUNICATION_QUEUE" \
    && /generate-queues.sh "audit" "\$AUDIT_QUEUE_QUEUE" \
    && /generate-queues.sh "meeting-center" "\$MEETING_CENTER_QUEUE" \
    && /generate-queues.sh "import-export" "\$IMPORT_EXPORT_QUEUE" \
    ; else \
    /generate-queues.sh "default" "\$SQS_QUEUE" \
    ; fi

RUN rm /generate-queues.sh

RUN chown -R "$PUID":"$PGID" /var/www/html \
    && chmod g+s -R /var/www/html

FROM worker-base AS worker-deploy

RUN /generate-queues.sh "default" "\$SQS_QUEUE" \
    && /generate-queues.sh "landlord" "\$LANDLORD_SQS_QUEUE" \
    && /generate-queues.sh "outbound-communication" "\$OUTBOUND_COMMUNICATION_QUEUE" \
    && /generate-queues.sh "audit" "\$AUDIT_QUEUE_QUEUE" \
    && /generate-queues.sh "meeting-center" "\$MEETING_CENTER_QUEUE" \
    && /generate-queues.sh "import-export" "\$IMPORT_EXPORT_QUEUE" 

RUN rm /generate-queues.sh

COPY --chown=$PUID:$PGID . /var/www/html

RUN npm ci --ignore-scripts \
    && rm -rf /var/www/html/vendor \
    && composer install --no-dev --no-interaction --no-progress --no-suggest --optimize-autoloader --apcu-autoloader \
    && npm run build:vite \
    && npm ci --ignore-scripts --omit=dev

RUN chown -R "$PUID":"$PGID" /var/www/html \
    && chgrp "$PGID" /var/www/html/storage/logs \
    && chmod g+s /var/www/html/storage/logs \
    && find /var/www/html -type d -print0 | xargs -0 chmod 755 \
    && find /var/www/html \( -path /var/www/html/docker -o -path /var/www/html/node_modules -o -path /var/www/html/vendor \) -prune -o -type f -print0 | xargs -0 chmod 644 \
    && chmod -R ug+rwx /var/www/html/storage /var/www/html/bootstrap/cache

FROM cli-serversideup AS scheduler-base

ENV NVM_VERSION v0.40.1
ENV NODE_VERSION 23.4.0
ENV NPM_VERSION ^11.0.0
ENV NVM_DIR /usr/local/nvm
RUN mkdir "$NVM_DIR"

RUN curl -o- "https://raw.githubusercontent.com/nvm-sh/nvm/${NVM_VERSION}/install.sh" | bash

ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

RUN echo "source $NVM_DIR/nvm.sh \
    && nvm install $NODE_VERSION \
    && nvm alias default $NODE_VERSION \
    && nvm use default \
    && npm install -g npm@$NPM_VERSION" | bash

COPY --chmod=755 ./docker/scheduler/s6-overlay/ /etc/s6-overlay/
COPY --chmod=755 ./docker/s6-overlay-shared/ /etc/s6-overlay/

ENTRYPOINT ["/init"]

FROM scheduler-base AS scheduler-development

# Fix permission issues in development by setting the "webuser"
# user to the same user and group that is running docker.
COPY ./docker/set-id /set-id

ARG PUID
ARG PGID
RUN set-id webuser ${PUID} ${PGID} ; \
    rm /set-id

RUN chown -R "$PUID":"$PGID" /var/www/html \
    && chmod g+s -R /var/www/html

FROM scheduler-base AS scheduler-deploy

COPY --chown=$PUID:$PGID . /var/www/html

RUN npm ci --ignore-scripts \
    && rm -rf /var/www/html/vendor \
    && composer install --no-dev --no-interaction --no-progress --no-suggest --optimize-autoloader --apcu-autoloader \
    && npm run build:vite \
    && npm ci --ignore-scripts --omit=dev

RUN chown -R "$PUID":"$PGID" /var/www/html \
    && chgrp "$PGID" /var/www/html/storage/logs \
    && chmod g+s /var/www/html/storage/logs \
    && find /var/www/html -type d -print0 | xargs -0 chmod 755 \
    && find /var/www/html \( -path /var/www/html/docker -o -path /var/www/html/node_modules -o -path /var/www/html/vendor \) -prune -o -type f -print0 | xargs -0 chmod 644 \
    && chmod -R ug+rwx /var/www/html/storage /var/www/html/bootstrap/cache

FROM cli-serversideup AS release-automation

COPY --chmod=755 ./docker/release-automation/s6-overlay/ /etc/s6-overlay/
COPY --chmod=755 ./docker/s6-overlay-shared/ /etc/s6-overlay/

COPY --chown=$PUID:$PGID . /var/www/html

RUN rm -rf /var/www/html/vendor \
    && composer install --no-dev --no-interaction --no-progress --no-suggest --optimize-autoloader --apcu-autoloader

RUN chown -R "$PUID":"$PGID" /var/www/html \
    && chgrp "$PGID" /var/www/html/storage/logs \
    && chmod g+s /var/www/html/storage/logs \
    && find /var/www/html -type d -print0 | xargs -0 chmod 755 \
    && find /var/www/html \( -path /var/www/html/docker -o -path /var/www/html/vendor \) -prune -o -type f -print0 | xargs -0 chmod 644 \
    && chmod -R ug+rwx /var/www/html/storage /var/www/html/bootstrap/cache

ENTRYPOINT ["/init"]

FROM cli-serversideup AS cli-local-tooling

ENV NVM_VERSION v0.40.1
ENV NODE_VERSION 23.4.0
ENV NPM_VERSION ^11.0.0
ENV NVM_DIR /usr/local/nvm
RUN mkdir "$NVM_DIR"

RUN curl -o- "https://raw.githubusercontent.com/nvm-sh/nvm/${NVM_VERSION}/install.sh" | bash

ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

RUN echo "source $NVM_DIR/nvm.sh \
    && nvm install $NODE_VERSION \
    && nvm alias default $NODE_VERSION \
    && nvm use default \
    && npm install -g npm@$NPM_VERSION" | bash