#!/bin/sh

# Wait for MySQL to be ready
echo "Waiting for database connection..."
while ! mysqladmin ping -h"$DB_HOST" --silent; do
    sleep 2
done

echo "Running migrations and seeders..."
php artisan migrate --force
php artisan db:seed --force

# Start PHP-FPM
exec php-fpm
