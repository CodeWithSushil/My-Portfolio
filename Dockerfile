# Use official PHP + Apache image
FROM php:8.4-apache

# Enable required extensions
RUN docker-php-ext-install pdo pdo_sqlite

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy project files
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Give SQLite folder write permission
RUN chown -R www-data:www-data /var/www/html/database && chmod -R 775 /var/www/html/database

# Expose Apache default port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
