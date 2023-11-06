#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install


echo "Caching config..."
php artisan config:cache


echo "Caching routes..."
php artisan route:cache


echo "Loading pictures..."
php artisan storage:link


echo "Running migrations..."
php artisan migrate --force


echo "Add data..."
php artisan db:seed --class=DatabaseSeeder


echo "Run Serve"
php artisan serve --show


echo "Run Key"
php artisan key:generate --show
