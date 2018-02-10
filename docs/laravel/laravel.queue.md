## Laravel Queue

### 文件
    QueueServiceProvider.php 队列 服务提供器
    QueueManager.php 队列 管理器

    CallQueuedHandler.php 
    FailingJob.php 失败工作
    InteractsWithQueue.php 队列交互
    LuaScripts.php Lua脚本

    SerializesAndRestoresModelIdentifiers.php
    SerializesModels.php 序列化 模型

    Worker.php 工作
    WorkerOptions.php 工作 选项
    Listener.php 监听器
    ListenerOptions.php 监听器 选项

    Queue.php 队列
    NullQueue.php 空 对列
    DatabaseQueue.php 数据库 队列
    RedisQueue.php Redis 队列
    SqsQueue.php 
    SyncQueue.php 
    BeanstalkdQueue.php

    InvalidPayloadException.php 不合法载荷 异常
    ManuallyFailedException.php 手动失败 异常
    MaxAttemptsExceededException.php 最大尝试次数 异常

    Capsule 封装
        Manager.php 管理器
    Connectors 连接器
        ConnectorInterface.php 连接器接口

        NullConnector.php 空
        DatabaseConnector.php 数据库
        RedisConnector.php Redis

        BeanstalkdConnector.php
        SqsConnector.php 
        SyncConnector.php 异步
    Console 控制台
        WorkCommand.php 工作者
        TableCommand.php 表格
        FailedTableCommand.php 失败

        ListFailedCommand.php 失败 列表
        FlushFailedCommand.php 失败 刷新
        ForgetFailedCommand.php 失败 清空

        ListenCommand.php 监听
        RestartCommand.php 重启
        RetryCommand.php 重试
        stubs 存根
            jobs.stub 工作
            failed_jobs.stub 失败的工作
    Jobs 工作
        Job.php 工作
        JobName.php 工作名称

        DatabaseJob.php 数据库
        RedisJob.php Redis

        BeanstalkdJob.php
        SqsJob.php
        SyncJob.php

        DatabaseJobRecord.php 数据库 记录
    Failed 失败的
        FailedJobProviderInterface.php 失败的工作 提供器[接口]

        NullFailedJobProvider.php 空 失败的工作 提供器
        DatabaseFailedJobProvider.php 数据库 失败的工作 提供器
    Events 事件
        JobProcessing.php 工作 处理中
        JobProcessed.php 工作 已完成
        JobExceptionOccurred.php 工作 异常发生
        JobFailed.php 工作 失败
        Looping.php 循环
        WorkerStopping.php 工作者 停止