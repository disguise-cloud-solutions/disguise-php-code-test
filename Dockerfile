FROM php:8.1-apache-buster

COPY --from=composer:2.1 /usr/bin/composer /usr/bin/composer

ENV APACHE_DOCUMENT_ROOT /opt/disguise/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN apt-get update && apt-get install -y \
    unzip \
    zip \
    && rm -rf /var/lib/apt/lists/* \
