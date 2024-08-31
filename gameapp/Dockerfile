# Partimos de la imagen php en su versión 8.2
FROM php:8.2-fpm

# Instalamos las dependencias necesarias
RUN apt-get update && apt-get install -y \
    build-essential \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    git \
    curl \
    nano \
    libpq-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo pdo_pgsql zip exif pcntl gd && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Instalamos composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecemos el directorio de trabajo
WORKDIR /var/www/html

# Copia todo el código de la aplicación
COPY . /var/www/html

# Instalamos dependencias de composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Exponemos el puerto 9000 a la network
EXPOSE 9000

# Corremos el comando php-fpm para ejecutar PHP
CMD ["php-fpm"]
