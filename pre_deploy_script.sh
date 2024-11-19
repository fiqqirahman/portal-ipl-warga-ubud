#!/bin/bash

# Define the base directory (adjust as needed)
BASE_DIR="./storage"

# Create the directory structure
mkdir -p "$BASE_DIR/app/public"
mkdir -p "$BASE_DIR/debugbar"
mkdir -p "$BASE_DIR/framework/cache/data"
mkdir -p "$BASE_DIR/framework/sessions"
mkdir -p "$BASE_DIR/framework/testing/disks/public"
mkdir -p "$BASE_DIR/framework/views"
mkdir -p "$BASE_DIR/logs"

chmod 755 -R $BASE_DIR

echo "Folder structure created successfully."

