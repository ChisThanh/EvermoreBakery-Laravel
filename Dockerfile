FROM php:8.2-fpm

# Cập nhật và cài đặt các gói cần thiết
RUN apt-get update -y && apt-get install -y \
    libicu-dev \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    gnupg2 \
    libxml2-dev \
    unixodbc-dev \
    curl \
    apt-transport-https \
    software-properties-common

# Tải và cài đặt public key vào keyring
RUN curl https://packages.microsoft.com/keys/microsoft.asc | tee /usr/share/keyrings/microsoft.asc

# Tạo file sources.list cho Microsoft repository
RUN echo "deb [signed-by=/usr/share/keyrings/microsoft.asc] https://packages.microsoft.com/debian/12/prod bookworm main" | tee /etc/apt/sources.list.d/mssql-release.list

# Cài đặt Microsoft ODBC Driver cho SQL Server
RUN apt-get update -y && \
    ACCEPT_EULA=Y apt-get install -y msodbcsql18 mssql-tools18

# Cài đặt driver SQL Server cho PHP
RUN pecl install sqlsrv pdo_sqlsrv && \
    docker-php-ext-enable sqlsrv pdo_sqlsrv

# Cài đặt các extension PHP cần thiết cho MySQL, GD, và gettext
RUN docker-php-ext-install gettext intl pdo_mysql gd \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Cài đặt Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Tạo file cấu hình Xdebug
RUN echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini

# Cài đặt Composer từ image composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy source code vào container
COPY ./ /var/www/html

# Gán quyền cho thư mục storage và bootstrap
RUN chown -R 777 /var/www/html/storage /var/www/html/bootstrap/cache