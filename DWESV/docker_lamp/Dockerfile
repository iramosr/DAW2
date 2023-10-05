FROM php:8.2-apache-bullseye
ARG DEBIAN_FRONTEND=noninteractive

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN apt-get update \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip 

RUN apt-get update \
    && apt-get install -y nodejs \ 
    && apt-get install -y npm 

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala Git
RUN apt-get update \
    && apt-get install -y git \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Crea un usuario de sistema para ejecutar Composer, Git y comandos de Artisan
RUN useradd -G www-data,root -u 1111 -d /home/daw2 daw2 \
    && mkdir -p /home/daw2/.composer \
    && chown -R daw2:daw2 /home/daw2

# Habilita el módulo Rewrite en Apache
RUN a2enmod rewrite

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Cambia al usuario daw2 (opcional)
# USER daw2