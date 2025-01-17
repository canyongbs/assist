#!/usr/bin/env bash
set -e

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
}

main() {
  # filter_out_non_docker_compose_args "$@"

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
    install)
      mkdir -p "$HOME/bin"
      sudo cp "$(realpath "$0")" "/usr/bin/pls"
      sudo chmod +x "/usr/bin/pls"
      echo "Installed pls to /usr/bin/pls"
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