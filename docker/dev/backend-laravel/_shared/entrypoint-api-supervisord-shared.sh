#!/bin/bash

# Composer install jika vendor belum ada
if [ ! -f /app/vendor/autoload.php ]; then
  echo "🔧 Running composer install..."
  composer install --prefer-dist --optimize-autoloader
else
  echo "✅ Vendor already installed. Skipping composer install."
fi

# Permission fix (optional)
chown -R ilhamrhmtkbr:ilhamrhmtkbr /app/storage /app/bootstrap/cache
chmod -R 775 /app/storage /app/bootstrap/cache

# Start Supervisor
echo "🚀 Starting supervisord..."
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
