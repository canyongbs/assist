#!/usr/bin/env bash
set -e

VERSION="1.0.0"

export COMPOSE_CMD=(docker compose -f docker-compose.dev.yml)

export PLS_USER_ID=${PLS_USER_ID:-$(id -u)}
export PLS_GROUP_ID=${PLS_GROUP_ID:-$(id -g)}

setup_color() {
    # Disable debug tracing temporarily
    { set +x; } 2>/dev/null

    RAINBOW="
      $(printf '\033[38;5;196m')
      $(printf '\033[38;5;202m')
      $(printf '\033[38;5;226m')
      $(printf '\033[38;5;082m')
    "
    RED=$(printf '\033[31m')
    GREEN=$(printf '\033[32m')
    YELLOW=$(printf '\033[33m')
    BLUE=$(printf '\033[34m')
    BOLD=$(printf '\033[1m')
    RESET=$(printf '\033[m')
    MAGENTA=$(printf '\033[1;35m')

    # Restore debug tracing if it was enabled
    if [[ "${SPIN_DEBUG:-false}" == "true" ]]; then
        set -x
    fi
}

check_version() {
  if [[ -f "pls" ]]; then
    local file_version
    file_version=$(grep '^VERSION=' pls | cut -d'"' -f2)
    if [[ -n "$file_version" && "$file_version" != "$VERSION" ]]; then
      echo "${BOLD}${YELLOW}⚠️ Warning: The version of the pls script in the current directory is $file_version, but the installed version is $VERSION.${RESET}"
      echo "${BOLD}${YELLOW}⚠️ You may want to run the install command to update the installed version.${RESET}"
    fi
  fi
}

setup_color

check_version

# Display general help message
show_help() {
  echo "Usage: pls [command] [options]"
  echo "Commands:"
  echo "  build     Build Docker images"
  echo "  up        Start Docker containers"
  echo "            The -d option can be used to start the containers in detached mode (e.g. ${BLUE}pls up -d${RESET})"
  echo "  stop      Stop Docker containers"
  echo "  down      Stop Docker containers"
  echo "            The -v option can be used to remove volumes (e.g. ${BLUE}pls down -v${RESET})"
  echo "  logs      Show logs for Docker containers"
  echo "              One or more names of the services, seperated by spaces, can be passed as arguments to filter the logs (e.g. ${BLUE}pls log apps${RESET} or ${BLUE}pls logs app worker${RESET})"
  echo "              The -f option can be used to follow the logs (e.g. ${BLUE}pls logs app -f${RESET})"
  echo "  exec      Execute a command in a running container"
  echo "  shell     Start a shell in a running container as webuser"
  echo "  rshell    Start a shell in a running container as root"
  echo "Options:"
  echo "  Any additional options will be passed directly to the respective docker compose commands"
  echo "  -v, --version  Display the version of pls"
}

main() {
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
    -h|--help)
      show_help
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
      echo "${BOLD}${GREEN}✅ Installed pls to $HOME/bin.${RESET}"
      echo "${BOLD}The command is now available in your shell as just \"pls\".${RESET}"
      echo "${BOLD}If changes are made to the script, you will need to run this command again on the new version script to update the installed version.${RESET}"
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