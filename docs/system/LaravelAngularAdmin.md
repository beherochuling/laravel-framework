# Laravel Angular Admin

## 安装
composer install
npm install
bower install

php artisan migrate
php artisan db:seed

## 运行
gulp && gulp watch
php artisan serve

## Angular生成器
php artisan ng:page name       #New page inside angular/app/pages/
php artisan ng:dialog name     #New custom dialog inside angular/dialogs/
php artisan ng:component name  #New component inside angular/app/components/
php artisan ng:service name    #New service inside angular/services/
php artisan ng:filter name     #New filter inside angular/filters/
php artisan ng:config name     #New config inside angular/config/