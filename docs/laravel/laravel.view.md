## Laravel View

### 文件
    ViewServiceProvider.php 视图 服务提供器
    Factory.php 工厂类
    View.php 视图
    ViewFinderInterface.php 视图 接口
    FileViewFinder.php
    ViewName.php 视图名称
    Compilers 编译
        CompilerInterface.php 编译器[接口]
        Compiler.php 编译器
        BladeCompiler.php [Blade 编译器]
        Concerns
            CompilesAuthorizations.php
            CompilesComments.php
            CompilesComponents.php
            CompilesConditionals.php
            CompilesEchos.php
            CompilesIncludes.php
            CompilesInjections.php
            CompilesJson.php
            CompilesLayouts.php
            CompilesLoops.php
            CompilesRawPhp.php
            CompilesStacks.php
            CompilesTranslations.php
    Concerns
        ManagesComponents.php 组件
        ManagesEvents.php 事件
        ManagesLayouts.php 布局
        ManagesLoops.php 循环
        ManagesStacks.php 堆栈
        ManagesTranslations.php 翻译
    Engines 引擎
        Engine.php 引擎
        CompilerEngine.php 编译器 引擎
        EngineResolver.php 引擎
        FileEngine.php 文件引擎
        PhpEngine.php PHP 引擎
    Middleware 中间件
        ShareErrorsFromSession.php