FROM php:8.4-cli

# 1. Install system dependencies required for PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    libonig-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# 2. Install the PHP extensions
RUN docker-php-ext-install \
    zip \
    mbstring \
    intl \
    pdo \
    pdo_sqlite \
    opcache


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
