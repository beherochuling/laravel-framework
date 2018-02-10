# Boilerplate

## 安装
composer install # 安装 php 类库
npm install # 安装 js 类库
.env # 创建环境配置文件 配置数据库
php artisan key:generate # 生成 APP_KEY
php artisan migrate # 迁移数据库
php artisan db:seed # 填充数据库

UserTableSeeder.php database\seeds\Access\UserTableSeeder.php 设置管理员信息 在 db:seed 前设置

npm install -g gulp
运行 gulp 或 gulp watch

## 问题
composer dumpautoload -o # PHP 类库 重新生成 autoload
删除 storage/framework/compiled.php # 删除缓存




访问控制配置
/** Access使用Role模型创建正确的关联 */
access.role

/** Access使用的Roles表用于保存角色到数据库 */
access.roles_table

/** Access使用的Permission模型用于创建正确的关联 */
access.permission

/** Permissions table used by Access to save permissions to the database. */
access.permissions_table

/** Access使用的PermissionGroup模型用于创建权限组. */
access.group

/** Access使用的Permissions表用于保存权限到数据库 */
access.permissions_group_table

/** Access使用的permission_role表用于保存权限和角色之间的关系到数据库 */
access.permission_role_table

/** Access使用的permission_user表用于保存权限和用户之间的关系到数据库，该表仅用于那些只归属于特定用户而不是角色的权限 */
access.permission_user_table
/** 指定权限之间依赖关系的表，例如用户在拥有编辑权限之前必须有对后台的访问权限 */
access.permission_dependencies_table

/** Access使用的assigned_roles用于保存分配的角色到数据库 */
access.assigned_roles_table

/** 用户配置 */
access.users.default_per_page

/** 当用户在前台注册后分配的角色 */
access.users.default_role

/** 用户注册时是否需要邮箱确认 */
access.users.confirm_email

/** 用户邮箱是否可以在编辑用户信息页面被修改 */
access.users.change_email

/** 一个角色是否必须至少包含一个权限还是可以单独存在*/
access.roles.role_must_contain_permission
应用路由中间件

内置的路由中间件允许你通过角色或权限实现登录认证：

Route::group(['middleware' => 'access.routeNeedsPermission:view-backend', function()
{
     Route::group(['prefix' => 'access'], function ()
     {
         /* 用户管理 */
         Route::resource('users', 'Backend\Access\UserController');
     });
});
下面的中间件处理boilerplate：

access.routeNeedsRole
access.routeNeedsPermission
创建自己的中间件

如果你想要创建属于自己的中间件，可以使用如下方法：

/**
 * 通过名字判断用户是否拥有某个角色
 * @param string $name
 * @return bool
 */
Access::hasRole($role);

/**
 * 判断用户是否拥有某个角色数组，以及认证时是否全部包含才必须返回true
 * @param array $roles
 * @param boolean $needsAll
 * @return bool
 */
Access::hasRoles($roles, $needsAll);

/**
 * 通过名字判断用户是否拥有某个权限
 * 还有一个封装方法hasPermission这个传入参数一样
 * @param string $permission.
 * @return bool
 */
Access::can($permission);

/**
 * 判断权限数组以及是否所有权限都具备才能继续
 * 还有一个封装方法hasPermissions和此传入参数一样
 * @param array $permissions
 * @param boolean $needsAll
 * @return bool
 */
Access::canMultiple($permissions, $needsAll);
Access默认使用当前登录用户，你还可以：

$user->hasRole($role);
$user->hasRoles($roles, $needsAll);
$user->can($permission);
$user->canMultiple($permissions, $needsAll);
$user->hasPermission($permission); //Wrapper function for can()
$user->hasPermissions($permissions, $needsAll); //Wrapper function for canMultiple()
Blade扩展

可以定义一个blade扩展命令将访问控制应用到页面数据的显示与否：

@role
接收角色名称或ID

@role('User')
   只有认证用户有User角色才会显示这里的内容
@endauth

@role(1)
    只有认证用户有ID为1的角色才会显示这里的内容
@endauth

@roles
接收角色名称或ID数组

@roles(['Administrator', 'User'])
    只有认证用户拥有`Administrator`或`User`角色才会显示这里的内容
@endauth

@roles([1, 2])
    只有认证用户拥有ID为1或2的角色才会显示这里的内容
@endauth

@needsroles
接收角色或角色ID数组并且只有用户拥有提供的全部角色时才返回true

@needsroles(['Administrator', 'User'])
    只有认证用户拥有`Administrator`和`User`角色才会显示这里的内容
@endauth

@needsroles([1, 2])
    只有认证用户拥有ID为1和2的角色才会显示这里的内容
@endauth

@permission
接收单个权限名称或ID

@permission('view-backend')
    只有用户拥有`view-backend`权限时才会显示这里的内容
@endauth

@permission(1)
    只有用户拥有ID为1的权限时才会显示这里的内容
@endauth

@permissions
接收权限名称或ID数组

@permissions(['view-backend', 'view-some-content'])
    只有用户拥有`view-backend`或`view-some-content`权限时才会显示这里的内容
@endauth

@permissions([1, 2])
    只有用户拥有ID为1或2的权限时才会显示这里的内容
@endauth

@needspermissions
接收权限或权限ID数组并且用户拥有提供的全部权限时才返回true

@needspermissions(['view-backend', 'view-some-content'])
    只有用户拥有`view-backend`和`view-some-content`权限时才会显示这里的内容
@endauth

@needspermissions([1, 2])
    只有用户拥有ID为1和2的权限时才会显示这里的内容
@endauth
注意：你还可以使用@else用于if/else语句
如果你想要显示或隐藏特定区块，可以在布局文件中这样做：

@role('User')
    @section('special_content')
@endauth

@permission('can_view_this_content')
    @section('special_content')
@endauth
你还可以追加更多blade扩展命令到App\Providers\AccessServiceProvider@registerBladeExtensions。


## 社交媒体
auth/login/github
github, facebook, twitter, google





javascript.bind_js_vars_to_this_view


admin/access/user 列表
admin/access/user/deactivated 待审核
admin/access/user/deleted 回收站
admin/access/user/create 新建
admin/access/user/1 查看
admin/access/user/1/edit 编辑
admin/access/user/1/password/change 更改密码
admin/access/user/1/clear-session 清除会话
admin/access/user/1/login-as 登录
admin/access/user/1/mark 启用1/停用0
恢复/删除
admin/access/user/1/delete 永久删除