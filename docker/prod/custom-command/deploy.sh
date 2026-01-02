#!/bin/bash
set -euo pipefail

log() {
  echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1"
}

log "Starting deployment process..."

# Check if Docker is installed
if ! command -v docker &> /dev/null; then
  log "Installing Docker..."
  curl -fsSL https://get.docker.com -o get-docker.sh
  sudo sh get-docker.sh
  sudo usermod -aG docker $USER
  sudo systemctl enable docker
  sudo systemctl start docker
  rm get-docker.sh

  sudo curl -L "https://github.com/docker/compose/releases/download/v2.24.0/docker-compose-$(uname -s)-$(uname -m)" \
    -o /usr/local/bin/docker-compose
  sudo chmod +x /usr/local/bin/docker-compose

  log "Docker installed successfully"
fi

# Fix Docker permissions
sudo chmod 666 /var/run/docker.sock

# Login to Docker Hub
echo "$DOCKER_PASSWORD" | docker login -u "$DOCKER_USERNAME" --password-stdin

# Clean up old resources
log "Cleaning up old resources..."

if [ -f "docker-compose.yml" ]; then
  docker-compose down --remove-orphans 2>/dev/null || true
fi

docker stop $(docker ps -aq) 2>/dev/null || true
docker rm $(docker ps -aq) 2>/dev/null || true
docker system prune -af --volumes
docker volume prune -f

# Pull new images
log "Pulling latest images..."
docker-compose pull

BACKEND_SERVICES=("backend-api-public" "backend-api-user" "backend-api-student" "backend-api-instructor" "backend-api-forum")
for service in "${BACKEND_SERVICES[@]}"; do
  log "Starting $service..."
  docker-compose up -d $service

  sleep 10
done

REVERB_SERVICES=("backend-api-user-reverb" "backend-api-forum-reverb")
for service in "${REVERB_SERVICES[@]}"; do
  log "Starting $service..."
  docker-compose up -d $service
  sleep 10
done

log "Starting Nginx..."
docker-compose up -d nginx

log "Performing final health check..."
sleep 30

ALL_SERVICES=(backend-api-public backend-api-user backend-api-student backend-api-instructor backend-api-forum backend-api-user-reverb backend-api-forum-reverb nginx)

for service in "${ALL_SERVICES[@]}"; do
  if docker-compose ps | grep -q "$service.*Up"; then
    log "✓ $service is running"
  else
    log "✗ $service failed to start"
  fi
done

log "Deployment completed!"