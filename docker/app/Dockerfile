FROM php:7.1-fpm

RUN apt-get update && \
	pecl channel-update pecl.php.net && \
	apt-get install -y libmcrypt-dev \
	curl \
	wget \
	git \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql exif iconv mbstring mysqli

RUN apt-get install -y pkg-config imagemagick libmagickwand-dev && \
    docker-php-ext-enable imagick

RUN apt-get install -y libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libxpm-dev \
    libvpx-dev \
    && docker-php-ext-configure gd \
        --with-freetype-dir=/usr/lib/x86_64-linux-gnu/ \
        --with-jpeg-dir=/usr/lib/x86_64-linux-gnu/ \
        --with-xpm-dir=/usr/lib/x86_64-linux-gnu/ \
        --with-vpx-dir=/usr/lib/x86_64-linux-gnu/ \
    && docker-php-ext-install gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

WORKDIR /var/www/

ARG userid
ARG groupid
RUN groupadd --gid $groupid app \
    && useradd app --uid $userid --gid $groupid -G www-data
RUN chown /home $userid
USER app

CMD ["php-fpm"]