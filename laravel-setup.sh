#!/bin/bash

# === CONFIGURATION ===
PHP_VERSION=8.2
DB_ROOT_PASS="StrongDbRootPassword" # Replace me
PROJECT1_NAME="project1"
PROJECT2_NAME="project2"
DOMAIN1="project1.local"
DOMAIN2="project2.local"

# === UPDATE SYSTEM ===
apt update && apt upgrade -y
apt install software-properties-common curl zip unzip git nano -y

# === INSTALL PHP + EXTENSIONS ===
add-apt-repository ppa:ondrej/php -y
apt update
apt install php$PHP_VERSION php$PHP_VERSION-cli php$PHP_VERSION-fpm php$PHP_VERSION-mysql php$PHP_VERSION-mbstring php$PHP_VERSION-xml php$PHP_VERSION-curl php$PHP_VERSION-zip php$PHP_VERSION-bcmath php$PHP_VERSION-gd -y

# === INSTALL MYSQL ===
DEBIAN_FRONTEND=noninteractive apt install mysql-server -y
mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '$DB_ROOT_PASS'; FLUSH PRIVILEGES;"

# === INSTALL COMPOSER ===
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# === CREATE LARAVEL PROJECTS ===
mkdir -p /var/www/$PROJECT1_NAME
mkdir -p /var/www/$PROJECT2_NAME

cd /var/www
composer create-project laravel/laravel:^12.0 $PROJECT1_NAME
composer create-project laravel/laravel:^12.0 $PROJECT2_NAME

# === SET PERMISSIONS ===
chown -R www-data:www-data /var/www/$PROJECT1_NAME
chown -R www-data:www-data /var/www/$PROJECT2_NAME
chmod -R 775 /var/www/$PROJECT1_NAME/storage /var/www/$PROJECT1_NAME/bootstrap/cache
chmod -R 775 /var/www/$PROJECT2_NAME/storage /var/www/$PROJECT2_NAME/bootstrap/cache

# === INSTALL NGINX ===
apt install nginx -y

# === CONFIGURE NGINX VHOSTS ===

# Project 1
cat > /etc/nginx/sites-available/$PROJECT1_NAME <<EOF
server {
    listen 80;
    server_name $DOMAIN1;

    root /var/www/$PROJECT1_NAME/public;
    index index.php index.html;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php$PHP_VERSION-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }

    error_log /var/log/nginx/${PROJECT1_NAME}_error.log;
    access_log /var/log/nginx/${PROJECT1_NAME}_access.log;
}
EOF

# Project 2
cat > /etc/nginx/sites-available/$PROJECT2_NAME <<EOF
server {
    listen 80;
    server_name $DOMAIN2;

    root /var/www/$PROJECT2_NAME/public;
    index index.php index.html;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php$PHP_VERSION-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }

    error_log /var/log/nginx/${PROJECT2_NAME}_error.log;
    access_log /var/log/nginx/${PROJECT2_NAME}_access.log;
}
EOF

ln -s /etc/nginx/sites-available/$PROJECT1_NAME /etc/nginx/sites-enabled/
ln -s /etc/nginx/sites-available/$PROJECT2_NAME /etc/nginx/sites-enabled/

nginx -t && systemctl reload nginx

# === DONE ===
echo "✅ Laravel multi-project setup complete!"
echo "➡️ Visit http://$DOMAIN1 and http://$DOMAIN2"
