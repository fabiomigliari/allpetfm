# Use an official PHP 8.2 image as the base image
FROM php:8.2-fpm

# Install any additional PHP extensions or dependencies you need
RUN apt-get update && apt-get install -y \
    # Add your dependencies here, for example:
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    net-tools
    # ...

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install required PHP extensions for Slim
RUN docker-php-ext-install pdo pdo_mysql

# Set the working directory in the container
WORKDIR /var/www/html

# Copy your PHP application code to the container
COPY ./api /var/www/html


# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
