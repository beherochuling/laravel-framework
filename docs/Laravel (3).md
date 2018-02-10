##
核心架构


Laravel Homestead +
- Laravel Valet
Laravel Forge +

## 安装
composer create-project laravel/laravel laravel-wechat --prefer-dist

composer global require "laravel/installer"
laravel new blog

## 配置
php artisan key:generate # 生成 .env 的 APP_KEY

## 优化
composer install --optimize-autoloader # 优化自动加载
php artisan config:cache # 优化配置 缓存
php artisan route:cache # 优化路由 缓存

## 模型
$article = Article::find(2);
$articles = Article::all();
$article = Article::where('title', '我是标题')->first();
$articles = Article::where('id', '>', 10)->where('id', '<', 20)->get();
$articles = Article::where('id', '>', 10)->where('id', '<', 20)->orderBy('updated_at', 'desc')->get();

## 助手函数
abort 抛出异常
abort_if true 抛出异常
abort_unless false 抛出异常

## action 方法
app
app_path
asset
auth
back
base_path
bcrypt
broadcast
cache
config
config_path
cookie
csrf_field
csrf_token
database_path
decrypt
dispatch
elixir
encrypt
env
event
factory
info
logger
method_field
mix
old
policy
public_path
redirect
request
resolve
resource_path
response
route
secure_asset
secure_url
session
storage_path
trans
trans_choice
__
url
validator 验证器
view 视图

## 命令
  clear-compiled       Remove the compiled class file
  down                 Put the application into maintenance mode
  env                  Display the current framework environment
  help                 Displays help for a command
  inspire              Display an inspiring quote
  list                 Lists commands
  migrate              Run the database migrations
  optimize             Optimize the framework for better performance
  serve                Serve the application on the PHP development server
  tinker               Interact with your application
  up                   Bring the application out of maintenance mode
app
  app:name             Set the application namespace
key
  key:generate         Set the application key
auth
  auth:clear-resets    Flush expired password reset tokens
cache
  cache:clear          Flush the application cache
  cache:forget         Remove an item from the cache
  cache:table          Create a migration for the cache database table
config
  config:cache         缓存配置
  config:clear         清除配置
db
  db:seed              Seed the database with records
event
  event:generate       Generate the missing events and listeners based on registration
make
  make:auth            Scaffold basic login and registration views and routes
  make:command         Artisan command
  make:controller      controller class
  make:event           event class
  make:job             job class
  make:listener        event listener class
  make:mail            email class
  make:middleware      middleware class
  make:migration       migration file
  make:model           Eloquent model class
  make:notification    notification class
  make:policy          policy class
  make:provider        service provider class
  make:request         form request class
  make:seeder          seeder class
  make:test            test class
migrate 迁移
  migrate:install      Create the migration repository
  migrate:refresh      Reset and re-run all migrations
  migrate:reset        Rollback all database migrations
  migrate:rollback     Rollback the last database migration
  migrate:status       Show the status of each migration
notifications
  notifications:table  Create a migration for the notifications table
queue
  queue:failed         List all of the failed queue jobs
  queue:failed-table   Create a migration for the failed queue jobs database table
  queue:flush          Flush all of the failed queue jobs
  queue:forget         Delete a failed queue job
  queue:listen         Listen to a given queue
  queue:restart        Restart queue worker daemons after their current job
  queue:retry          Retry a failed queue job
  queue:table          Create a migration for the queue jobs database table
  queue:work           Start processing jobs on the queue as a daemon
route 路由
  route:cache          Create a route cache file for faster route registration
  route:clear          Remove the route cache file
  route:list           List all registered routes
schedule 计划
  schedule:run         Run the scheduled commands
session 会话
  session:table        Create a migration for the session database table
storage 存储
  storage:link         Create a symbolic link from "public/storage" to "storage/app/public"
vendor composer 包
  vendor:publish       Publish any publishable assets from vendor packages
view 视图
  view:clear           Clear all compiled view files

## 问题
### migration 失败：
[PDOException]
SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 1000 bytes

#### 解决步骤
升级 MySql版本到 5.5.3 以上
修改文件 App\Providers\AppServiceProvider
	use Illuminate\Support\Facades\Schema;

	class AppServiceProvider extends ServiceProvider
	{
		public function boot()
		{
		  Schema::defaultStringLength(191);
		}
	}

### migration 失败：
[PDOException]
SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'json null) default character set utf8mb4 collate utf8mb4_unicode_ci' at line 1

#### 解决步骤
升级 MySql版本到 5.7 以上
修改文件 Illuminate\Database\Schema\Blueprint.php
    public function json($column)
    {
        return $this->addColumn('text', $column);
    }

### CSRF
{!! csrf_field() !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">