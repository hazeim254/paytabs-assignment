FROM php

COPY ./ /app
WORKDIR /app

RUN apt-get update && apt-get install -y git unzip libicu-dev

RUN docker-php-ext-install pdo_mysql mysqli intl

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=. --filename=composer && \
    mv composer /usr/local/bin/

RUN composer install

EXPOSE 8080

ENTRYPOINT ["php", "/app/spark", "serve"]
