#!/usr/bin/env zsh

docker compose down --remove-orphans
docker compose build
docker compose --env-file .env.local up -d server

echo "Success!"