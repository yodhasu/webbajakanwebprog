#!/bin/bash

# Install Composer
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Run Laravel and npm commands
composer install --no-dev
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm install
npm run build

