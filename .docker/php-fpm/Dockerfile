FROM php:7.4-fpm
WORKDIR "/var/www"

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install zlib1g-dev \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
