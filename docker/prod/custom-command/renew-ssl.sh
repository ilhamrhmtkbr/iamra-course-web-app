#!/bin/bash
set -euo pipefail

log() {
  echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1"
}

log "Starting SSL certificate renewal check..."

# Renew certificates using webroot (ZERO DOWNTIME!)
docker run --rm \
  -v "$PWD/letsencrypt:/etc/letsencrypt" \
  -v "$PWD/certbot:/var/www/certbot" \
  certbot/certbot renew \
  --webroot \
  --webroot-path=/var/www/certbot \
  --quiet \
  --deploy-hook "echo 'Certificate renewed!'"

# Check if renewal happened (certbot exit code 0 = success OR no renewal needed)
if [ $? -eq 0 ]; then
  log "Certificate check completed successfully"

  # Reload nginx to use new certificates (kalau ada yang di-renew)
  if docker-compose ps | grep -q "nginx.*Up"; then
    log "Reloading Nginx to apply new certificates..."
    docker-compose exec nginx nginx -s reload
    log "Nginx reloaded successfully!"
  fi
else
  log "ERROR: Certificate renewal failed!"
  # Send alert (opsional: integrate dengan Slack/email)
  exit 1
fi

log "SSL renewal process completed"