## Laravel Notifications

### 文件
    Notification.php 通知
    NotificationSender.php 通知 发送器
    NotificationServiceProvider.php 通知 服务提供者
    RoutesNotifications.php 路由通知
    SendQueuedNotifications.php 发送队列通知
    DatabaseNotification.php 数据库通知
    DatabaseNotificationCollection.php 数据库通知集合
    HasDatabaseNotifications.php 有数据库通知
    ChannelManager.php 频道管理器
    Notifiable.php 可通知
    AnonymousNotifiable.php 匿名可通知
    Action.php
    -Console 命令
        NotificationTableCommand.php notifications:table
        stubs 代码存根
            notifications.stub
    -Events 事件
        BroadcastNotificationCreated.php 广播通知创建
        NotificationSending.php 通知发送中
        NotificationSent.php 通知成功
        NotificationFailed.php 通知失败
    -resources
        views
            email.blade.php
    Channels
        BroadcastChannel.php 广播
        DatabaseChannel.php 数据库
        MailChannel.php 邮件
        NexmoSmsChannel.php 短信
        SlackWebhookChannel.php 
    Messages
        BroadcastMessage.php 广播
        DatabaseMessage.php 数据库
        MailMessage.php 邮件
        NexmoMessage.php 短信
        SimpleMessage.php 短信
        SlackMessage.php Slack
        SlackAttachment.php
        SlackAttachmentField.php 失败