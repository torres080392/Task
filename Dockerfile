# Utiliza una imagen base de PHP con las extensiones necesarias para Laravel
FROM php:8.0.2-fpm

# Instala las dependencias necesarias para ejecutar Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mbstring exif pcntl bcmath opcache zip

# Establece el directorio de trabajo en el cual se colocará tu aplicación
WORKDIR /var/www/html

# Copia los archivos de tu proyecto Laravel al contenedor
COPY . .

# Instala las dependencias de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-scripts --no-autoloader

# Copia el archivo de configuración de Laravel
COPY .env.example .env

# Genera una clave de aplicación para Laravel
RUN php artisan key:generate

# Ejecuta cualquier comando adicional necesario para configurar tu aplicación (por ejemplo, migraciones de base de datos)
# RUN php artisan migrate

# Expone el puerto en el cual escuchará tu aplicación (por ejemplo, el puerto 8000)
EXPOSE 8000

# Comando para iniciar el servidor web de PHP para tu aplicación Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
