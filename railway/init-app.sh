#!/bin/bash
# Railway Laravel initialization script
# Based on Railway's official Laravel deployment guide
# Note: We don't use 'set -e' here to ensure the app starts even if initialization fails

echo "Starting Laravel initialization..."

# Run migrations (don't fail if this errors)
echo "Running database migrations..."
php artisan migrate --force || echo "Warning: Migrations failed, but continuing..."

# Clear all caches first (don't fail if this errors)
echo "Clearing caches..."
php artisan optimize:clear || echo "Warning: Cache clear had issues, but continuing..."

# Cache the various components of the Laravel application (don't fail if this errors)
echo "Caching Laravel components..."
php artisan config:cache || echo "Warning: Config cache failed, but continuing..."
php artisan event:cache || echo "Warning: Event cache failed, but continuing..."
php artisan route:cache || echo "Warning: Route cache failed, but continuing..."
php artisan view:cache || echo "Warning: View cache failed, but continuing..."

echo "Laravel initialization complete!"

