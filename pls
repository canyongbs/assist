#!/usr/bin/env bash
set -e

VERSION="0.6.0"

export COMPOSE_CMD=(docker compose -f docker-compose.dev.yml)

export PLS_USER_ID=${PLS_USER_ID:-$(id -u)}
export PLS_GROUP_ID=${PLS_GROUP_ID:-$(id -g)}

# Display general help message
show_help() {
  echo "Usage: pls [command] [options]"
  echo "Commands:"
  echo "  build     Build Docker images"
  echo "  up        Start Docker containers"
  echo "  stop      Stop Docker containers"
  echo "  down      Stop Docker containers"
  echo "  logs      Show logs for Docker containers"
  echo "  exec      Execute a command in a running container"
  echo "  shell     Start a shell in a running container as webuser"
  echo "  rshell    Start a shell in a running container as root"
  echo "Options:"
  echo "  Any additional options will be passed directly to the respective docker compose commands"
  echo "  -v, --version  Display the version of pls"
}

main() {
  if [[ -f "pls" ]]; then
    local file_version
    file_version=$(grep '^VERSION=' pls | cut -d'"' -f2)
    if [[ -n "$file_version" && "$file_version" != "$VERSION" ]]; then
      echo "Warning: The version of the pls script in the current directory is $file_version, but the installed version is $VERSION."
      echo "You may want to run the install command to update the installed version."
    fi
  fi

  COMMAND=$1
  shift 1
 
  export PLS_USER_ID=$(id -u)
  export PLS_GROUP_ID=$(id -g)

  case "$COMMAND" in
    build)
      exec "${COMPOSE_CMD[@]}" build "$@"
      ;;
    up)
      exec "${COMPOSE_CMD[@]}" up "$@"
      ;;
    down)
      exec "${COMPOSE_CMD[@]}" down "$@"
      ;;
    logs)
      exec "${COMPOSE_CMD[@]}" logs "$@"
      ;;
    stop)
      exec "${COMPOSE_CMD[@]}" stop "$@"
      ;;
    exec)
      exec "${COMPOSE_CMD[@]}" exec "$@"
      ;;
    shell)
      local service=$1

      if [[ -z "$service" ]]; then
        service=app
      fi

      exec "${COMPOSE_CMD[@]}" exec -it -u webuser "$service" /bin/bash
      ;;
    rshell)
      local service=$1

      if [[ -z "$service" ]]; then
        service=app
      fi

      exec "${COMPOSE_CMD[@]}" exec -it "$service" /bin/bash
      ;;
    -v|--version)
      echo "$VERSION"
      ;;
    install)
      mkdir -p "$HOME/bin"
      cp "$(realpath "$0")" "$HOME/bin/pls"
      chmod +x "$HOME/bin/pls"
      if ! grep -q "$HOME/bin" "$HOME/.bashrc"; then
        echo 'export PATH="$HOME/bin:$PATH"' >> "$HOME/.bashrc"
      fi
      source ~/.bashrc
      echo -e "Installed pls to $HOME/bin.\nThe command is now available in your shell as just \"pls\".\nIf changes are made to the script, you will need to run this command again to update the installed version."
      ;;
    *)
      echo "Unknown command: $COMMAND"
      show_help
      exit 1
      ;;
  esac
}

if [[ $# -eq 0 ]]; then
  show_help
  exit 1
fi

main "$@"