FROM php:8.3-fpm

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_pgsql zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier composer.json et composer.lock
COPY composer.json composer.lock ./

# Copier les fichiers du projet
COPY . .

# Créer le répertoire storage et log
RUN mkdir -p storage/logs bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# Créer un script d'entrée
RUN echo '#!/bin/bash\n\
if [ ! -d "vendor" ]; then\n\
    echo "Installing Composer dependencies..."\n\
    composer install\n\
fi\n\
php-fpm' > /entrypoint.sh && chmod +x /entrypoint.sh

EXPOSE 9000

CMD ["/entrypoint.sh"]
