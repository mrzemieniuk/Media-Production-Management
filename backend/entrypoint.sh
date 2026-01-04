#!/bin/sh
set -e

sleep 5

php bin/console doctrine:migrations:migrate --no-interaction --allow-no-migration

exec "$@"
