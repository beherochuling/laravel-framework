# Lumen
## Install
### Lumen 安装器 安装
composer global require "laravel/lumen-installer=~1.0"
lumen new service

### Composer Create-Project 安装
composer create-project laravel/lumen --prefer-dist

## 优雅链接
### httpd
Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
### nginx
location / {
	try_files $uri $uri/ /index.php?$query_string;
}