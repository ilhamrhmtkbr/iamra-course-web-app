#!/bin/bash
set -euo pipefail

log() {
  echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1"
}

# Check if SSL certificates already exist
if [ -f "letsencrypt/live/course.iamra.site/fullchain.pem" ]; then
  log "SSL certificates already exist!"

  EXPIRY=$(docker run --rm \
    -v "$PWD/letsencrypt:/etc/letsencrypt" \
    certbot/certbot certificates 2>/dev/null | grep "Expiry Date" | head -1 || echo "")

  if [ -n "$EXPIRY" ]; then
    log "Certificate info: $EXPIRY"
  fi

  if grep -q "nginx-http.conf" docker-compose.yml; then
    log "Switching to HTTPS configuration..."
    docker-compose stop nginx
    sed -i 's|./nginx-http.conf:/etc/nginx/nginx.conf:ro|./nginx-https.conf:/etc/nginx/nginx.conf:ro|' docker-compose.yml
    docker-compose up -d nginx
    log "Switched to HTTPS successfully!"
  else
    log "Already using HTTPS configuration"
  fi

  exit 0
fi

log "No SSL certificates found. Starting certificate generation..."
log "Make sure your domains are pointing to this server!"

# FIRST TIME: Use standalone (nginx belum jalan)
docker run --rm \
  -v "$PWD/letsencrypt:/etc/letsencrypt" \
  -v "$PWD/certbot:/var/www/certbot" \
  -p 80:80 \
  certbot/certbot certonly \
  --standalone \
  --email ilhamrhmtkbr@iamra.site \
  --agree-tos \
  --no-eff-email \
  --non-interactive \
  --expand \
  -d course.iamra.site \
  -d forum.course.iamra.site \
  -d user.course.iamra.site \
  -d student.course.iamra.site \
  -d instructor.course.iamra.site \
  -d api-public.course.iamra.site \
  -d api-forum.course.iamra.site \
  -d api-user.course.iamra.site \
  -d api-student.course.iamra.site \
  -d api-instructor.course.iamra.site

if [ $? -eq 0 ]; then
  log "SSL certificates obtained successfully!"

  # Switch to HTTPS config
  sed -i 's|./nginx-http.conf:/etc/nginx/nginx.conf:ro|./nginx-https.conf:/etc/nginx/nginx.conf:ro|' docker-compose.yml
  docker-compose up -d nginx

  log "SSL setup completed! All services now running with HTTPS!"
else
  log "Failed to obtain SSL certificates."
  log "Continuing with HTTP configuration..."
  exit 1
fi