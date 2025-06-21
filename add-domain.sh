#!/bin/bash

read -p "Enter your domain (e.g. mysite.com): " DOMAIN
read -p "Enter Laravel project folder name (e.g. myproject): " PROJECT

PHP_VERSION=8.2
PROJECT_DIR="/var/www/$PROJECT"

# Clone or create Laravel project (optional)
if [ ! -d "$PROJECT_DIR" ]; then
    echo "Creating Laravel project..."
    composer create-project laravel/laravel:^12.0 $PROJECT_DIR
fi

# Set permissions
chown -R www-data:www-data $PROJECT_DIR
chmod -R 775 $PROJECT_DIR/storage $PROJECT_DIR/bootstrap/cache

# Create Nginx config
NGINX_FILE="/etc/nginx/sites-available/$DOMAIN"

cat > $NGINX_FILE <<EOF
server {
    listen 80;
    server_name $DOMAIN www.$DOMAIN;

    root $PROJECT_DIR/public;
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

    error_log /var/log/nginx/${DOMAIN}_error.log;
    access_log /var/log/nginx/${DOMAIN}_access.log;
}
EOF

# Enable site
ln -s $NGINX_FILE /etc/nginx/sites-enabled/

# Reload Nginx
nginx -t && systemctl reload nginx

echo "✅ Domain $DOMAIN is now connected to Laravel project at $PROJECT_DIR"
echo "🔄 Checking & Installing Certbot for SSL..."

# Install Certbot + SSL for domain
apt install -y certbot python3-certbot-nginx

# Run Certbot with auto config
certbot --nginx -d $DOMAIN -d www.$DOMAIN --non-interactive --agree-tos -m admin@$DOMAIN

# Reload Nginx to apply HTTPS
systemctl reload nginx

echo "✅ SSL installed! Visit: https://$DOMAIN"
