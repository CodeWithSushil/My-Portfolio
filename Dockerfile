# syntax=docker/dockerfile:1

FROM alpine:3.22

# ------------------------------------------------------------
# Versions / environment
# ------------------------------------------------------------
ARG PHP_VERSION=8.4

ENV APP_ENV=production \
    APP_ROOT=/var/www/html \
    APACHE_DOCUMENT_ROOT=/var/www/html/public \
    PHP_MEMORY_LIMIT=128M \
    PHP_UPLOAD_MAX_FILESIZE=16M \
    PHP_POST_MAX_SIZE=16M \
    PHP_MAX_EXECUTION_TIME=30 \
    PHP_MAX_INPUT_VARS=1000 \
    TZ=UTC

# ------------------------------------------------------------
# Alpine packages
# ------------------------------------------------------------
RUN apk add --no-cache \
        apache2 \
        apache2-proxy \
        apache2-ssl \
        apache2-utils \
        ca-certificates \
        curl \
        openssl \
        tzdata \
        unzip \
        zip \
        sqlite \
        sqlite-dev \
        libxml2 \
        libxml2-dev \
        libzip \
        libzip-dev \
        oniguruma \
        oniguruma-dev \
        icu-libs \
        icu-dev \
        libcurl \
        curl-dev \
        openssl-dev \
        zlib \
        zlib-dev \
        php84 \
        php84-fpm \
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
        php84-ctype \
        php84-fileinfo \
        php84-tokenizer \
        php84-session \
        php84-iconv \
        php84-intl \
        php84-json \
        php84-phar \
        php84-bcmath \
        php84-pcntl \
        php84-posix \
    && rm -rf /var/cache/apk/*

# ------------------------------------------------------------
# PHP command compatibility
# ------------------------------------------------------------
RUN ln -sf /usr/bin/php84 /usr/bin/php \
    && ln -sf /usr/sbin/php-fpm84 /usr/sbin/php-fpm

# ------------------------------------------------------------
# Apache configuration
# ------------------------------------------------------------
RUN mkdir -p \
        /run/apache2 \
        /var/log/apache2 \
        /var/www/html \
        /var/www/html/public \
        /var/www/html/storage \
        /var/www/html/storage/database \
        /var/www/html/storage/logs \
        /var/www/html/storage/cache

# Apache modules
RUN sed -i \
        -e 's/^#LoadModule rewrite_module/LoadModule rewrite_module/' \
        -e 's/^#LoadModule headers_module/LoadModule headers_module/' \
        -e 's/^#LoadModule env_module/LoadModule env_module/' \
        -e 's/^#LoadModule expires_module/LoadModule expires_module/' \
        -e 's/^#LoadModule deflate_module/LoadModule deflate_module/' \
        /etc/apache2/httpd.conf

# ------------------------------------------------------------
# Apache virtual host
# ------------------------------------------------------------
RUN cat > /etc/apache2/conf.d/app.conf <<'EOF'
ServerName localhost

Listen $PORT

DocumentRoot "/var/www/html/public"

<Directory "/var/www/html/public">
    Options -Indexes -Includes
    AllowOverride All
    Require all granted

    DirectoryIndex index.php
</Directory>

# Never expose application files outside public/
<Directory "/var/www/html">
    Require all denied
</Directory>

# Re-allow the public directory
<Directory "/var/www/html/public">
    Options -Indexes -Includes
    AllowOverride All
    Require all granted
    DirectoryIndex index.php
</Directory>

# ------------------------------------------------------------
# Protect hidden files
# ------------------------------------------------------------
<FilesMatch "^\.">
    Require all denied
</FilesMatch>

# Explicitly protect common sensitive files
<FilesMatch "\.(env|ini|log|sql|sqlite|sqlite3|db|bak|backup|dist|yml|yaml|lock)$">
    Require all denied
</FilesMatch>

# Do not expose PHP source outside the document root
<FilesMatch "\.(php[0-9]?|phar)$">
    Require all granted
</FilesMatch>

# Security headers
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
Header always set Permissions-Policy "camera=(), microphone=(), geolocation=()"

# Disable server version information
ServerTokens Prod
ServerSignature Off

# Logs
ErrorLog /var/log/apache2/error.log
CustomLog /var/log/apache2/access.log combined
EOF

# ------------------------------------------------------------
# PHP-FPM configuration
# ------------------------------------------------------------
RUN sed -i \
        's|^listen = .*|listen = 127.0.0.1:9000|' \
        /etc/php84/php-fpm.d/www.conf \
    && sed -i \
        's|^;clear_env = no|clear_env = no|' \
        /etc/php84/php-fpm.d/www.conf

# ------------------------------------------------------------
# Apache -> PHP-FPM
# ------------------------------------------------------------
RUN cat > /etc/apache2/conf.d/php-fpm.conf <<'EOF'
<IfModule proxy_module>
    ProxyPassMatch "^/(.*\.php(/.*)?)$" \
        "fcgi://127.0.0.1:9000/var/www/html/public/$1"
</IfModule>

DirectoryIndex index.php index.html
EOF

# ------------------------------------------------------------
# PHP.ini
# ------------------------------------------------------------
RUN cat > /etc/php84/conf.d/99-production.ini <<'EOF'
[PHP]

; -----------------------------------------------------------
; Production
; -----------------------------------------------------------
expose_php = Off

display_errors = Off
display_startup_errors = Off
log_errors = On
error_log = /var/log/php84/error.log

error_reporting = E_ALL

; -----------------------------------------------------------
; Security
; -----------------------------------------------------------
allow_url_fopen = Off
allow_url_include = Off

cgi.fix_pathinfo = 0

; Disable dangerous functions where practical
disable_functions = exec,passthru,shell_exec,system,proc_open,popen

; -----------------------------------------------------------
; Resources
; -----------------------------------------------------------
memory_limit = 128M

max_execution_time = 30
max_input_time = 60
max_input_vars = 1000

post_max_size = 16M
upload_max_filesize = 16M

max_file_uploads = 20

; -----------------------------------------------------------
; Sessions
; -----------------------------------------------------------
session.use_strict_mode = 1
session.use_only_cookies = 1

session.cookie_httponly = 1
session.cookie_secure = 1
session.cookie_samesite = Lax

session.gc_maxlifetime = 7200

; -----------------------------------------------------------
; Date
; -----------------------------------------------------------
date.timezone = Asia/Kolkata

; -----------------------------------------------------------
; OPcache
; -----------------------------------------------------------
[opcache]

opcache.enable = 1
opcache.enable_cli = 0

opcache.memory_consumption = 128
opcache.interned_strings_buffer = 16
opcache.max_accelerated_files = 20000

opcache.validate_timestamps = 0
opcache.revalidate_freq = 0

opcache.save_comments = 1
opcache.fast_shutdown = 1

opcache.jit = off
opcache.jit_buffer_size = 0
EOF

# ------------------------------------------------------------
# PHP log directory
# ------------------------------------------------------------
RUN mkdir -p /var/log/php84 \
    && touch /var/log/php84/error.log

# ------------------------------------------------------------
# SQLite database
# ------------------------------------------------------------
RUN mkdir -p /var/www/html/storage/database \
    && touch /var/www/html/storage/database/app.sqlite \
    && chown -R apache:apache /var/www/html/storage \
    && chmod 750 /var/www/html/storage \
    && chmod 750 /var/www/html/storage/database \
    && chmod 640 /var/www/html/storage/database/app.sqlite

# ------------------------------------------------------------
# Application
# ------------------------------------------------------------
COPY . /var/www/html

# ------------------------------------------------------------
# Re-apply safe permissions after COPY
# ------------------------------------------------------------
RUN mkdir -p \
        /var/www/html/storage/database \
        /var/www/html/storage/logs \
        /var/www/html/storage/cache \
        /var/log/php84 \
        /run/apache2 \
    && chown -R apache:apache /var/www/html/storage \
    && chown -R apache:apache /var/log/php84 \
    && chmod -R 750 /var/www/html/storage \
    && chmod 640 /var/www/html/storage/database/app.sqlite

# ------------------------------------------------------------
# Protect everything outside public/
# ------------------------------------------------------------
RUN find /var/www/html -type f -name ".htaccess" -exec chmod 640 {} \; \
    && find /var/www/html -type f -name ".env*" -exec chmod 600 {} \; 2>/dev/null || true

# ------------------------------------------------------------
# Apache startup script
# ------------------------------------------------------------
COPY docker/entrypoint.sh /entrypoint.sh

RUN chmod +x /entrypoint.sh

# ------------------------------------------------------------
# HTTP
# ------------------------------------------------------------
EXPOSE $PORT

# ------------------------------------------------------------
# Start PHP-FPM + Apache
# ------------------------------------------------------------
ENTRYPOINT ["/entrypoint.sh"]
