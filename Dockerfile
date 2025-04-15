# Używamy PHP 8.2 z Apache
FROM php:8.2-apache

# Włącz rozszerzenie mysqli (jeśli używasz MySQL)
RUN docker-php-ext-install pdo pdo_mysql

# Zainstaluj Composer
RUN apt-get update && apt-get install -y unzip curl \
  && curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/bin/composer

# Skopiuj pliki do katalogu, który Apache serwuje
COPY . /var/www/html/

# Przejdź do katalogu aplikacji i zainstaluj zależności
WORKDIR /var/www/html/
RUN [ -f composer.json ] && composer install || echo "Brak pliku composer.json"

