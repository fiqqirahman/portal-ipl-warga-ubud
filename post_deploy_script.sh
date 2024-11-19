#!/bin/bash

# Check if a container name is provided as an argument
if [ -z "$1" ]; then
  echo "Usage: $0 <container-name>"
  exit 1
fi

# Assign the container name from the first argument
CONTAINER_NAME="$1"

# Run the Docker command with the dynamic container name
docker exec "$CONTAINER_NAME" php artisan storage:link

docker exec "$CONTAINER_NAME" php artisan master-config:sync

echo "Post Deploy config Run successfully."
