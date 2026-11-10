
FROM serversideup/php:8.3-fpm-nginx

USER root

WORKDIR /var/www/html

# Salin source code proyek
COPY --chown=www-data:www-data . .

# Install dependency Laravel untuk production
RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

# Build aset CSS dan JavaScript
FROM node:22-bookworm-slim AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY . .
RUN npm run build

# Gabungkan hasil build ke image PHP
FROM serversideup/php:8.3-fpm-nginx

USER root

WORKDIR /var/www/html

COPY --from=0 --chown=www-data:www-data /var/www/html /var/www/html
COPY --from=frontend --chown=www-data:www-data /app/public/build /var/www/html/public/build

USER www-data
