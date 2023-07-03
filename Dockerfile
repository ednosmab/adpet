FROM php:8.2-apache
LABEL maintainer="edsongsilva"
RUN apt update
RUN apt install -y \
    g++ \
    libicu-dev \
    libpq-dev \
    libmcrypt-dev \
    libmcrypt4 \
    mcrypt \
    git \
    zip \
    unzip \
    libzip-dev \
    zlib1g-dev \
    curl \
    libpng-dev \
    libxml2-dev \
    libonig-dev
# RUN apt install php8-mbstring
RUN rm -r /var/lib/apt/lists/*
RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-install pgsql
RUN docker-php-ext-install zip
RUN docker-php-ext-install opcache
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
ENV APP_HOME /var/www/html
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
#RUN sed -i -e "s/html/html\/webroot/g" /etc/apache2/sites-enabled/000-default.conf
RUN a2enmod rewrite
COPY . $APP_HOME
RUN chown -R www-data:www-data $APP_HOME
