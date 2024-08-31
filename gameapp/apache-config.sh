#!/bin/sh

echo "ServerName localhost" >> /etc/apache2/apache2.conf
a2enmod rewrite
sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf
echo 'ProxyPassMatch ^/(.*\.php(/.*)?)$ fcgi://app:9000/var/www/html/public/$1' >> /etc/apache2/apache2.conf
apache2-foreground
