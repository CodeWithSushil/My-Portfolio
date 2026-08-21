#!/bin/sh

set -eu

echo "Starting PHP-FPM..."

mkdir -p /run/apache2
mkdir -p /var/log/php84

chown -R apache:apache /var/www/html/storage
chown -R apache:apache /var/log/php84

chmod 750 /var/www/html/storage
chmod 750 /var/www/html/storage/database

if [ ! -f /var/www/html/storage/database/app.sqlite ]; then
    touch /var/www/html/storage/database/app.sqlite
fi

chmod 640 /var/www/html/storage/database/app.sqlite

php-fpm84 -D

echo "Starting Apache..."

exec httpd -D FOREGROUND
