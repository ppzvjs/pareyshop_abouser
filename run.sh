#!/usr/bin/env zsh

docker compose down --remove-orphans
docker compose build
docker compose up -d server

echo "Success!"