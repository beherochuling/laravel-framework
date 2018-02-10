## Laravel Routing

### 文件
    RoutingServiceProvider.php 路由 服务提供器
    Controller.php 控制器
    ControllerDispatcher.php 控制器调度

    ControllerMiddlewareOptions.php
    ImplicitRouteBinding.php
    MiddlewareNameResolver.php
    PendingResourceRegistration.php
    Pipeline.php 管道
    RedirectController.php
    Redirector.php 重定向
    ResourceRegistrar.php
    ResponseFactory.php
    Route.php 路由
    RouteAction.php
    RouteBinding.php
    RouteCollection.php
    RouteCompiler.php
    RouteDependencyResolverTrait.php
    RouteGroup.php
    RouteParameterBinder.php
    Router.php
    RouteRegistrar.php
    RouteSignatureParameters.php
    RouteUrlGenerator.php
    SortedMiddleware.php
    UrlGenerator.php
    ViewController.php
    Console 控制台
        ControllerMakeCommand.php
        MiddlewareMakeCommand.php
        stubs
            controller.model.stub
            controller.nested.stub
            controller.plain.stub
            controller.stub
            middleware.stub
    Contracts 契约
        ControllerDispatcher.php
    Events 事件
        RouteMatched.php
    Exceptions 异常
        UrlGenerationException.php
    Matching 匹配
        HostValidator.php
        MethodValidator.php
        SchemeValidator.php
        UriValidator.php
        ValidatorInterface.php
    Middleware 中间件
        SubstituteBindings.php
        ThrottleRequests.php
        ThrottleRequestsWithRedis.php