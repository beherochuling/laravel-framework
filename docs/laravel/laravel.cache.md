## Laravel Cache

### 文件
    CacheServiceProvider.php 缓存 服务提供器
    CacheManager.php 缓存管理器

    Repository.php 仓库
    RateLimiter.php 速率限制
    RetrievesMultipleKeys.php 读取多个键值
    TagSet.php

    MemcachedConnector.php Memcached 连接器
    ApcWrapper.php Apc 封装

    NullStore.php 没有
    ArrayStore.php 数组
    FileStore.php 文件
    DatabaseStore.php 数据库
    MemcachedStore.php Memcached
    RedisStore.php Redis
    ApcStore.php Apc
    TaggableStore.php Taggable

    TaggedCache.php
    RedisTaggedCache.php Redis

    Lock.php 锁
    MemcachedLock.php Memcached 锁
    RedisLock.php Redis 锁
    Console 控制台
        CacheTableCommand.php
        ClearCommand.php
        ForgetCommand.php
        stubs 存根
            cache.stub
    Events 事件
        CacheEvent.php
        CacheHit.php
        CacheMissed.php
        KeyForgotten.php
        KeyWritten.php