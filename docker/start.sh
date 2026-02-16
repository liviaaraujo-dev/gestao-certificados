#!/bin/bash

echo "Iniciando ambiente Laravel com Nginx + PHP-FPM..."

if [ ! -d "vendor" ]; then
  composer install
fi

if [ ! -d "node_modules" ]; then
  npm install
fi

if [ ! -f "public/build/manifest.json" ]; then
  echo "Gerando build do Vite..."
  npm run build
fi

chown -R www-data:www-data storage bootstrap/cache

php artisan key:generate --force || true

php artisan migrate --force || true

php artisan config:clear
php artisan cache:clear
php artisan view:clear

npm run dev &

php-fpm
