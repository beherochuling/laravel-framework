Facade.php
    abstract

App.php app
    \Illuminate\Foundation\Application
-Artisan.php \Illuminate\Contracts\Console\Kernel
    \Illuminate\Contracts\Console\Kernel
Auth.php auth
    \Illuminate\Auth\AuthManager
    \Illuminate\Contracts\Auth\Factory
    \Illuminate\Contracts\Auth\Guard
    \Illuminate\Contracts\Auth\StatefulGuard
-Blade.php static::$app['view']->getEngineResolver()->resolve('blade')->getCompiler();
    \Illuminate\View\Compilers\BladeCompiler
-Bus.php \Illuminate\Contracts\Bus\Dispatcher
    \Illuminate\Contracts\Bus\Dispatcher
Cache.php cache
    \Illuminate\Cache\CacheManager
    \Illuminate\Cache\Repository
Config.php config
    \Illuminate\Config\Repository
Cookie.php cookie
    \Illuminate\Cookie\CookieJar

    has
    get
-Crypt.php encrypter
    \Illuminate\Encryption\Encrypter
DB.php db
    \Illuminate\Database\DatabaseManager
    \Illuminate\Database\Connection
-Event.php events
    \Illuminate\Events\Dispatcher
-File.php files
    \Illuminate\Filesystem\Filesystem
-Gate.php Illuminate\Contracts\Auth\Access\Gate
    \Illuminate\Contracts\Auth\Access\Gate
Hash.php hash
    \Illuminate\Hashing\BcryptHasher
-Input.php request
    \Illuminate\Http\Request
    get
-Lang.php translator
    \Illuminate\Translation\Translator
Log.php log
    \Illuminate\Log\Writer
-Mail.php mailer
    \Illuminate\Mail\Mailer
-Password.php auth.password
    \Illuminate\Auth\Passwords\PasswordBroker

    const RESET_LINK_SENT = 'passwords.sent'; // 重置密码链接发送
    const PASSWORD_RESET = 'passwords.reset'; // 密码重置
    const INVALID_USER = 'passwords.user'; // 用户名不正确
    const INVALID_PASSWORD = 'passwords.password'; // 密码不正确
    const INVALID_TOKEN = 'passwords.token'; // 令牌不正确
Queue.php queue
    \Illuminate\Queue\QueueManager
    \Illuminate\Queue\Queue
Redirect.php redirect
    \Illuminate\Routing\Redirector
Redis.php redis
    \Illuminate\Redis\Database
Request.php request 请求
    \Illuminate\Http\Request
-Response.php \Illuminate\Contracts\Routing\ResponseFactory 响应
    Illuminate\Contracts\Routing\ResponseFactory
Route.php router
    \Illuminate\Routing\Router
- Schema.php static::$app['db']->connection()->getSchemaBuilder()
    \Illuminate\Database\Schema\Builder

    connection
Session.php session
    \Illuminate\Session\SessionManager
    \Illuminate\Session\Store
- Storage.php filesystem
    \Illuminate\Filesystem\FilesystemManager
URL.php url
    \Illuminate\Routing\UrlGenerator
Validator.php validator
    \Illuminate\Validation\Factory
View.php view
    \Illuminate\View\Factory

+ Eloquent
- Bus
- Input

    +/config/app.php aliases
    -//src/Support/Facades/Facade 子类