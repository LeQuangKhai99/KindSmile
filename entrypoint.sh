#!/bin/bash

# Create database directory & file if missing
mkdir -p /var/www/html/database
if [ ! -f /var/www/html/database/database.sqlite ]; then
    touch /var/www/html/database/database.sqlite
fi

# Ensure storage framework directories exist
mkdir -p /var/www/html/storage/framework/sessions \
         /var/www/html/storage/framework/views \
         /var/www/html/storage/framework/cache \
         /var/www/html/bootstrap/cache

# Fix permissions for Apache www-data user
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# If APP_KEY is empty, set a fallback default
if [ -z "$APP_KEY" ]; then
    export APP_KEY="base64:iE2gNi2KnmK9nQSDa04hM5Flxyrg+hgYtjBE/uTKGTE="
fi

# Run migrations & seed database if needed
php artisan migrate --force || true
php artisan db:seed --force || true

# Clear and optimize config at container startup
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start Apache in foreground
exec apache2-foreground
