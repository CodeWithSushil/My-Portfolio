FROM alpine:3.22

ENV APP_ENV=production \
    APP_ROOT=/var/www/html

# PHP + required extensions
RUN apk add --no-cache \
    php84 \
    php84-cli \
    php84-opcache \
    php84-mbstring \
    php84-curl \
    php84-openssl \
    php84-sodium \
    php84-sqlite3 \
    php84-pdo \
    php84-pdo_sqlite \
    php84-xml \
    php84-dom \
    php84-zip \
    php84-json \
    php84-session \
    php84-fileinfo \
    php84-tokenizer \
    php84-phar \
    sqlite \
    curl \
    openssl \
    unzip \
    tzdata \
    ca-certificates

# PHP command
RUN ln -sf /usr/bin/php84 /usr/bin/php

WORKDIR /var/www/html

# Create application directories
RUN mkdir -p \
    /var/www/html/public \
    /var/www/html/storage/database \
    /var/www/html/storage/logs \
    /var/www/html/storage/cache

# Copy application
COPY . /var/www/html

# Production PHP configuration
RUN mkdir -p /etc/php84/conf.d /var/log/php84 \
    && touch /var/log/php84/error.log \
    && cat > /etc/php84/conf.d/99-production.ini <<'EOF'
[PHP]

expose_php = Off

display_errors = Off
display_startup_errors = Off
log_errors = On
error_log = /var/log/php84/error.log

error_reporting = E_ALL

memory_limit = 128M

max_execution_time = 30
max_input_time = 60
max_input_vars = 1000

post_max_size = 16M
upload_max_filesize = 16M

allow_url_fopen = Off
allow_url_include = Off

cgi.fix_pathinfo = 0

session.use_strict_mode = 1
session.use_only_cookies = 1

session.cookie_httponly = 1
session.cookie_secure = 1
session.cookie_samesite = Lax

date.timezone = Asia/Kolkata

[opcache]

opcache.enable = 1
opcache.enable_cli = 0

opcache.memory_consumption = 128
opcache.interned_strings_buffer = 16
opcache.max_accelerated_files = 20000

opcache.validate_timestamps = 0
opcache.revalidate_freq = 0

opcache.save_comments = 1

opcache.jit = off
opcache.jit_buffer_size = 0
EOF

# SQLite database
RUN touch /var/www/html/storage/database/app.sqlite \
    && chmod 750 /var/www/html/storage \
    && chmod 750 /var/www/html/storage/database \
    && chmod 640 /var/www/html/storage/database/app.sqlite

# Production port
EXPOSE 10000

# Render provides PORT automatically
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-10000} -t public"]
