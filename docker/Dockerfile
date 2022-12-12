FROM wordpress:6.1.1-php8.1-apache

LABEL Chris Pashalis <cpashalis@imagendentalpartners.com>

# Install locales
RUN apt update && apt install -y locales
RUN locale-gen en_US.UTF-8

ENV LANG en_US.UTF-8
ENV LANGUAGE en_US:en
ENV LC_ALL en_US.UTF-8
ENV DEBIAN_FRONTEND=noninteractive

# Get latest version of software-properties-common first
RUN apt update && apt upgrade -y && apt install -y software-properties-common

# Basic Requirements
RUN apt update \
    && apt install -y lsb-base mime-support perl procps curl unzip git gzip wget python3-pip sqlite3 memcached libmemcached-tools supervisor

RUN mkdir -p /var/lock/apache2 /var/run/apache2 /var/run/sshd /var/log/supervisor
#RUN update-alternatives --set php /usr/bin/php8.1

# Install Composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

# Install WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp

#Install text editor
RUN apt update && apt install -y vim

# Misc. Cleanup
RUN mkdir /run/php \
    && apt remove -y --purge software-properties-common \
    && apt -y autoremove \
    && apt clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* 

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs
RUN npm install --global yarn

#COPY docker/uploads.ini /usr/local/etc/php/8.1/conf.d/uploads.ini
COPY  docker/php.ini 	/usr/local/etc/php/conf.d/
COPY  docker/memcached.conf /usr/local/etc/memcached.conf

EXPOSE 80

COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY ./ /var/www/html/
#RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 777 /var/www/html/wp-content/plugins
RUN chmod -R 777 /var/www/html/wp-content/upgrade
RUN chmod -R 777 /var/www/html/wp-content/uploads
RUN chmod -R 777 /var/www/html/wp-content/uploads-webpc
#WORKDIR /var/www/html/
#RUN php /usr/bin/composer install --no-interaction && ls

WORKDIR /var/www/html/wp-content/themes/imagen-practice-sage
RUN php /usr/bin/composer install --no-interaction && ls

RUN yarn && yarn build

#RUN mkdir -p /var/www/html/wp-content/plugins/all-in-one-wp-migration/storage
#RUN chown $(whoami):www-data -R /var/www/html/wp-content/plugins/all-in-one-wp-migration/storage && chmod -R 777 /var/www/html/web/app/plugins/all-in-one-wp-migration/storage

# RUN mkdir /var/www/html/web/app/uploads
CMD ["/usr/bin/supervisord"]

