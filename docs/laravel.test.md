## test

### 运行测试
phpunit # 运行测试
phpunit.xml # 配置文件
php artisan config:clear # 清除配置缓存

### 创建测试类
php artisan make:test UserTest # 功能测试
php artisan make:test UserTest --unit # 单元测试

自定义 setUp 方法请确保调用了 parent::setUp() 方法


