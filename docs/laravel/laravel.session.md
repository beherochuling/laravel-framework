## Laravel Session

### 文件
    SessionServiceProvider.php 会话 服务提供器

    CookieSessionHandler.php Cookie 会话处理器
    FileSessionHandler.php 文件 会话处理器
    DatabaseSessionHandler.php 数据库 会话服务器
    CacheBasedSessionHandler.php 缓存 会话处理器

    Store.php 存储
    EncryptedStore.php 加密存储

    ExistenceAwareInterface.php 存在[接口]
    SessionManager.php 会话管理器

    TokenMismatchException.php 令牌未找到 异常

    Console 控制台
        SessionTableCommand.php 会话表命令 数据库存储会话
        stubs 存根
            database.stub 表 SQL
    Middleware 中间件
        AuthenticateSession.php 认证会话
        StartSession.php 开始会话