FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Redis extension
RUN pecl install redis \
    && docker-php-ext-enable redis

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# рабочая директория
WORKDIR /var/www

# default UID/GID, будет переопределено через docker-compose
ARG UID=1000
ARG GID=1000

RUN groupadd -g ${GID} appgroup \
    && useradd -u ${UID} -g ${GID} appuser \
    && chown -R appuser:appgroup /var/www

USER appuser
