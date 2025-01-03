FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    zip unzip curl git libpq-dev libzip-dev && \
    docker-php-ext-install pdo pdo_mysql && \
    a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application code
COPY . .

# Expose the port your application will run on
EXPOSE 8000

# Install Laravel dependencies
RUN composer install

# Ensure permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

CMD ["php", "artisan", "migrate"]
# Set the command to run your Laravel app
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
