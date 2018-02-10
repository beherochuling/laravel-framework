## 安装
cp .env.example .env
composer install # 安装扩展包
php artisan key:generate # 生成唯一站点加密 Key
php artisan vendor:publish --all # 发布扩展包资源
php artisan migrate # 迁移
php artisan db:seed # 填充数据
php artisan storage:link

php artisan package:handle h5 publish
php artisan package:handle h5 link

php artisan package:handle feed resolve

php aritisan package:handle im install
php aritisan package:handle news install





yarn clean-dist
yarn dev
yarn hot 
yarn watch 调试
yarn dist 生成
