# Use the official PHP Apache image
FROM php:8.2-apache

# Enable common PHP extensions (like MySQLi, PDO)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy all project files into the container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]

