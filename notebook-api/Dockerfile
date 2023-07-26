# Указываем базовый образ
FROM php:8.2-fpm

# Устанавливаем необходимые пакеты и расширения
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip

# Открываем порт 8000 для веб-сервера PHP-FPM
EXPOSE 8000


# Устанавливаем необходимые расширения для PHP
RUN docker-php-ext-install zip pdo pdo_mysql

# Копируем файлы вашего проекта в контейнер
COPY . /var/www/html

# Задаем рабочую директорию
WORKDIR /var/www/html

# Устанавливаем правильные права доступа
RUN chown -R www-data:www-data /var/www/html

# Устанавливаем composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Устанавливаем зависимости проекта с помощью composer
RUN composer install

# Запускаем PHP-FPM при старте контейнера
CMD ["php-fpm", "-R"]
