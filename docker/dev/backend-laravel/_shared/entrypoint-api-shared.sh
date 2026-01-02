#!/bin/sh

# Jalankan composer install (sekali saja jika belum ada vendor/autoload.php)
if [ ! -f /app/vendor/autoload.php ]; then
  echo "🔧 Running composer install..."
  composer install --prefer-dist --optimize-autoloader
else
  echo "✅ Vendor already installed. Skipping composer install."
fi

# Permission fix
chown -R ilhamrhmtkbr:ilhamrhmtkbr /app/storage /app/bootstrap/cache
chmod -R 775 /app/storage /app/bootstrap/cache

exec gosu ilhamrhmtkbr php artisan serve --host=0.0.0.0 --port=8080