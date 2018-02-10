## Laravel Redis

### 文件
    RedisServiceProvider.php Redis 服务提供器
    RedisManager.php Redis 管理器

    Connectors 连接器
        PhpRedisConnector.php PhpRedis
        PredisConnector.php Predis
    Connections 连接
        Connection.php 连接
        PhpRedisConnection.php PhpRedis
        PhpRedisClusterConnection.php PhpRedis 集群
        PredisConnection.php Predis
        PredisClusterConnection.php Predis 集群
    Limiters 限制
        ConcurrencyLimiterBuilder.php 当前限制 构建器
        ConcurrencyLimiter.php 当前限制
        DurationLimiterBuilder.php 持续限制 构建器
        DurationLimiter.php 持续限制