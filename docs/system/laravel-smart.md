## 安装
composer require dominator88/laravel-smart:dev-master # composer 安装

php artisan vendor:publish --provider="Smart\SmartServiceProvider" # vendor
php artisan make:auth # 账号系统
php artisan smart:install # 安装

'admin' => [
    'driver' => 'eloquent',
    'model' => Smart\Models\SysUser::class,
]

地址 http://sitename/backend/
帐户 sys_admin
密码 123123
邮箱 admin@admin.com

npm update


# AsgardCms
## 安装
composer global require asgardcms/asgardcms-installer
asgardcms new Blog

composer create-project asgardcms/platform your-project-name