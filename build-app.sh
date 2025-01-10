#!/bin/bash
# Ensure this file has executable permissions, run `chmod +x build-app.sh`

# Build assets using NPM
npm run build

# Clear cache
php artisan optimize:clear

# Cache Laravel configurations
php artisan config:cache
php artisan event:cache
php artisan route:cache
php artisan view:cache
