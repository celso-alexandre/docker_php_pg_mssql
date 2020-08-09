FROM php:apache

ENV ACCEPT_EULA=Y

# Microsoft SQL Server Prerequisites
RUN apt-get update && apt-get install -y gnupg2
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN curl https://packages.microsoft.com/config/debian/10/prod.list > /etc/apt/sources.list.d/mssql-release.list

RUN apt-get install -y --no-install-recommends \
  locales \
  apt-transport-https \
  && echo "pt_BR.UTF-8 UTF-8" > /etc/locale.gen \
  && locale-gen \
  && apt-get update \
  && apt-get -y --no-install-recommends install \
  unixodbc-dev \
  msodbcsql17

RUN pecl install sqlsrv pdo_sqlsrv xdebug \
  && docker-php-ext-enable sqlsrv pdo_sqlsrv xdebug

# PostgreSQL
#RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql
RUN apt-get install -y libpq-dev \
  && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
  && docker-php-ext-install pdo pdo_pgsql pgsql