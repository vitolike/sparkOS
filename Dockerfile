FROM php:7.4-apache

# Instalar extensões PHP do MySQL necessárias
RUN docker-php-ext-install mysqli pdo_mysql

# Habilitar o módulo rewrite do Apache (importante para .htaccess funcionar)
RUN a2enmod rewrite

# Alterar a configuração padrão do Apache para permitir override via .htaccess
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Definir o diretório de trabalho padrão no container
WORKDIR /var/www/html
