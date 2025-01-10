#!/bin/bash
# Ensure this file has executable permissions, run `chmod +x build-app.sh`

# Build assets using NPM
npm run build

# Clear cache to prevent stale data
php artisan optimize:clear

# Temporary: Refresh the database migrations and seed
php artisan migrate:fresh --seed --force

# Cache the various components of the Laravel application
php artisan config:cache
php artisan event:cache
php artisan route:cache
php artisan view:cache
