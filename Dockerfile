FROM php:8.4-cli-alpine

WORKDIR /app

# System dependencies
RUN apk add --no-cache \
    curl \
    unzip \
    git \
    libzip-dev \
    oniguruma-dev \
    icu-dev \
    sqlite

# PHP extensions
RUN docker-php-ext-install

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy Composer files first for Docker layer caching
COPY composer.json composer.lock ./

# Install production dependencies only
RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --no-progress \
    --optimize-autoloader

# Copy application
COPY . .

# Render provides the PORT environment variable
EXPOSE 10000

CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-10000} -t public"]
