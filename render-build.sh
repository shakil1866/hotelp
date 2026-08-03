#!/usr/bin/env bash
# Exit on error
set -o errexit

echo "Running Composer Install..."
composer install --no-dev --optimize-autoloader

echo "Running NPM Install and Build..."
npm install
npm run build

echo "Clearing Cache..."
php artisan optimize:clear

echo "Running Migrations..."
# Note: Ensure you have your database environment variables set in Render
php artisan migrate --force
