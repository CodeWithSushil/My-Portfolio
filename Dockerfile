# Use official PHP + Apache image
FROM php:8.4-apache

# Install dependencies for SQLite and PHP extensions
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    && docker-php-ext-configure pdo_sqlite --with-pdo-sqlite=/usr \
    && docker-php-ext-install pdo pdo_sqlite \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy project files
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Give SQLite folder write permission
RUN mkdir -p /var/www/html/database \
    && chown -R www-data:www-data /var/www/html/database \
    && chmod -R 775 /var/www/html/database

# Create database if it doesn't exist and set proper permissions
RUN DB_PATH="/var/www/html/database.db" && \
    DB_DIR="$(dirname "$DB_PATH")" && \
    mkdir -p "$DB_DIR" && \
    touch "$DB_PATH" && \
    chown www-data:www-data "$DB_PATH" "$DB_DIR" && \
    chmod 664 "$DB_PATH" && \
    chmod 775 "$DB_DIR"

# Expose the default Apache port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
