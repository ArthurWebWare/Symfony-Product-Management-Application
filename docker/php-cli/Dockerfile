FROM php:8.2-cli

# Install necessary dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    wget \
    zlib1g-dev \
    libmcrypt-dev \
    libzip-dev \
    curl \
    && apt-get clean \
    && docker-php-ext-install pdo pdo_mysql mysqli zip

# Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

# Install Composer
RUN wget https://getcomposer.org/installer -O - -q | php -- --install-dir=/bin --filename=composer --quiet

WORKDIR /symfony

# Changing the UID and GID of an existing www-data user.
ARG PUID=1000
ARG PGID=1000

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

COPY --chown=www-data:www-data . .

# Changing directory owner.
RUN chown -R www-data:www-data /symfony

# Switch to user www-data
USER www-data
