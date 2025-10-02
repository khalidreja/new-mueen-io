#!/bin/bash

# Exit on any error
set -e

echo "Starting Laravel deployment..."

# Wait for database to be ready (if using external database)
# sleep 10

# Generate application key if not set
if [ -z "$APP_KEY" ]; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# Clear and cache configurations
echo "Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

echo "Caching configurations..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run database migrations
echo "Running database migrations..."
php artisan migrate --force

# Create storage link
echo "Creating storage link..."
php artisan storage:link

# Set proper permissions
echo "Setting permissions..."
chown -R www:www /var/www
chmod -R 755 /var/www/storage
chmod -R 755 /var/www/bootstrap/cache

echo "Starting services..."
exec supervisord -c /etc/supervisor/conf.d/supervisord.conf