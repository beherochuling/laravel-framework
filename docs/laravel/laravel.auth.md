## Laravel Auth

### 文件
    AuthManager.php 权限管理器
    GuardHelpers.php 卫士辅助
    Authenticatable.php 可认证
    AuthenticationException.php 认证异常
    Recaller.php 重新调用
    GenericUser.php 普通用户

    RequestGuard.php 请求卫士
    SessionGuard.php 会话卫士
    TokenGuard.php 令牌卫士

    AuthServiceProvider.php 权限 服务 提供者
    CreatesUserProviders.php 创建 用户 提供者
    DatabaseUserProvider.php 数据库 要用户 提供者
    EloquentUserProvider.php 模型 要用户 提供者

    Access 访问
        Gate.php 门禁 use HandlesAuthorization
        -HandlesAuthorization.php 处理授权 trait
        -Response.php 响应 授权成功返回
    	-AuthorizationException.php 授权异常 授权失败返回
    Console 命令
    	AuthMakeCommand.php make:auth
    	ClearResetsCommand.php auth:clear-resets
    	-stubs 代码存根
    		make make 模板
        		routes.stub 路由
        		controllers 控制器
        			HomeController.stub 主控制器
    			views 视图
    				home.stub 主页
                    layouts 布局
                        app.stub 布局页面
        			auth 认证
            			register.stub 注册页面 
                        login.stub 登录页面
            			passwords 找回密码
            				email.stub 填写 email
            				reset.stub 重置密码
    -Events 事件
    	Attempting.php 尝试
    	Authenticated.php 有效 use Illuminate\Queue\SerializesModels
    	Failed.php 无效
    	Lockout.php 锁定
    	Login.php 登录
    	Logout.php 退出 use Illuminate\Queue\SerializesModels
        Registered.php 注册 use Illuminate\Queue\SerializesModels
    	PasswordReset.php 密码重置 use Illuminate\Queue\SerializesModels
    Middleware
    	Authenticate.php 认证通过
    	AuthenticateWithBasicAuth.php 认证通过 基本认证
    	Authorize.php 授权
    Notifications 通知
    	ResetPassword.php 重置密码
    Passwords 密码
    	CanResetPassword.php
    	DatabaseTokenRepository.php
    	PasswordBroker.php
    	PasswordBrokerManager.php
    	PasswordResetServiceProvider.php
    	TokenRepositoryInterface.php