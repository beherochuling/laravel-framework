## Laravel Foundation

### 文件
AliasLoader.php
Application.php
ComposerScripts.php
helpers.php 辅助函数
EnvironmentDetector.php
Inspiring.php
PackageManifest.php
ProviderRepository.php
Auth 认证
    AuthenticatesUsers.php
    RedirectsUsers.php
    RegistersUsers.php
    ResetsPasswords.php
    SendsPasswordResetEmails.php
    ThrottlesLogins.php
    User.php
    Access 访问
        Authorizable.php
        AuthorizesRequests.php
Bootstrap 引导
    BootProviders.php
    HandleExceptions.php
    LoadConfiguration.php
    LoadEnvironmentVariables.php
    RegisterFacades.php
    RegisterProviders.php
    SetRequestForConsole.php
Bus 
    Dispatchable.php
    DispatchesJobs.php
    PendingChain.php
    PendingDispatch.php
Console 控制台
    Kernel.php

    AppNameCommand.php

    UpCommand.php
    DownCommand.php

    ClearCompiledCommand.php 清理编译
    ClosureCommand.php 闭包
    RuleMakeCommand.php
    OptimizeCommand.php 优化
    QueuedCommand.php
    PresetCommand.php 
    VendorPublishCommand.php
    ViewClearCommand.php
    PackageDiscoverCommand.php 包
    ServeCommand.php
    StorageLinkCommand.php
    KeyGenerateCommand.php key 生成
    EnvironmentCommand.php 环境
    EventGenerateCommand.php 事件 生成

    ConfigCacheCommand.php 配置 缓存
    ConfigClearCommand.php 配置 清除
    RouteListCommand.php 路由 列表
    RouteCacheCommand.php 路由 缓存
    RouteClearCommand.php 路由 清除

    ConsoleMakeCommand.php 控制台 创建
    JobMakeCommand.php 工作 创建
    ListenerMakeCommand.php 监听器 创建
    ModelMakeCommand.php 模型 创建
    NotificationMakeCommand.php 通知 创建
    MailMakeCommand.php 邮件 创建
    PolicyMakeCommand.php 策略 创建
    ProviderMakeCommand.php 提供器 创建
    RequestMakeCommand.php 请求 创建
    ResourceMakeCommand.php 资源 创建
    EventMakeCommand.php 事件 创建
    TestMakeCommand.php 测试 创建
    ExceptionMakeCommand.php 异常 创建
    Presets 呈现
        Preset.php 呈现
        None.php 空
        Bootstrap.php Bootstrap
        React.php React
        Vue.php Vue
    none-stubs 空 存根
        app.js
    bootstrap-stubs bootstrap 存根
        app.scss
        _variables.scss
    react-stubs React 存根
        app.js
        Example.js
        webpack.mix.js
        vue-stubs
            app.js
            ExampleComponent.vue
            webpack.mix.js
    stubs 存根
        console.stub 控制台

        event.stub 事件
        event-handler.stub 事件处理器
        event-handler-queued.stub 事件队列处理器

        exception.stub 异常
        exception-report.stub 异常 报告
        exception-render.stub 异常渲染器
        exception-render-report.stub 异常渲染器 报告

        listener.stub 监听器
        listener-duck.stub 监听器
        listener-queued-duck.stub 队列监听器
        listener-queued.stub 队列监听器

        mail.stub 邮件
        markdown-mail.stub Markdown 邮件
        notification.stub 通知
        markdown-notification.stub Markdown 通知
        job.stub 工作
        job-queued.stub 队列工作
        model.stub 模型
        pivot.model.stub 关联模型
        policy.plain.stub 策略
        policy.stub 策略
        resource.stub 资源
        resource-collection.stub 资源集合
        test.stub 测试
        unit-test.stub 单元测试

        markdown.stub
        provider.stub
        request.stub
        routes.stub
        rule.stub
Events 事件
    Dispatchable.php 分派
    LocaleUpdated.php 地址更新
Exceptions 异常
    Handler.php 处理器
    views 视图
        404.blade.php 404
        419.blade.php 419
        429.blade.php 429
        500.blade.php 500
        503.blade.php 503
        layout.blade.php 布局
Http http
    Kernel.php 核心
    FormRequest.php 表单请求
    Events 事件
        RequestHandled.php 请求已处理
    Exceptions 异常
        MaintenanceModeException.php 维护模式异常
    Middleware 中间件
        CheckForMaintenanceMode.php
        ConvertEmptyStringsToNull.php
        TransformsRequest.php 转换请求
        TrimStrings.php Trim 字符串
        ValidatePostSize.php 验证 POST 大小
        VerifyCsrfToken.php 验证 CSRF 令牌
Providers 提供器
    ArtisanServiceProvider.php
    ComposerServiceProvider.php
    ConsoleSupportServiceProvider.php
    FormRequestServiceProvider.php
    FoundationServiceProvider.php
stubs 存根
    facade.stub 假数据
Support 支持
    Providers
        AuthServiceProvider.php
        EventServiceProvider.php
        RouteServiceProvider.php
Testing 测试
    DatabaseMigrations.php
    DatabaseTransactions.php
    HttpException.php
    RefreshDatabase.php
    RefreshDatabaseState.php
    TestCase.php
    TestResponse.php
    WithoutEvents.php
    WithoutMiddleware.php
    Concerns
        InteractsWithAuthentication.php
        InteractsWithConsole.php
        InteractsWithContainer.php
        InteractsWithDatabase.php
        InteractsWithExceptionHandling.php
        InteractsWithRedis.php
        InteractsWithSession.php
        MakesHttpRequests.php
        MocksApplicationServices.php
    Constraints
        HasInDatabase.php
        SoftDeletedInDatabase.php
Validation 验证
    ValidatesRequests.php 验证器请求