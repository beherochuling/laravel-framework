## 语言

### 语言翻译目录 resources/lang
/resources
    /lang
        /en
            messages.php
        /es
            messages.php

### 默认语言 config/app.php
'locale' => 'en', // 默认语言
'fallback_locale' => 'en', // 备用语言

### 函数
App::setLocale($locale); // 动态设置默认语言
App::getLocale($locale); // 获取默认语言
App::isLocale('en') // 判断当前默认语言

Route::get('welcome/{locale}', function ($locale) {
    App::setLocale($locale);
});

### 使用翻译字符串作为键
resources/lang/es.json
{
    "I love programming.": "Me encanta programar."
}

### 检索
echo __('messages.welcome');
echo __('I love programming.');

#### blade
{{ __('messages.welcome') }}
@lang('messages.welcome')

### 语言替换
'welcome' => 'Welcome, :name', // 定义
echo __('messages.welcome', ['name' => 'dayle']); // 使用

'welcome' => 'Welcome, :NAME', // Welcome, DAYLE // 大写形式
'goodbye' => 'Goodbye, :Name', // Goodbye, Dayle // 首字母大写形式

### 复数规则
'apples' => 'There is one apple|There are many apples',
'apples' => '{0} There are none|[1,19] There are some|[20,*] There are many',

echo trans_choice('messages.apples', 10);

### 扩展包语言
resources/lang/vendor/{package}/{locale}

skyrim/hearthfire 扩展包的英文语言文件 messages.php
resources/lang/vendor/hearthfire/en/messages.php


## Mix

### 运行
npm run dev # 开发模式
npm run production # 生产模式
npm run watch # 实时编译
npm run watch-poll # 高级实时编译

### 环境变量
.env
MIX_SENTRY_DSN_PUBLIC=http://example.com
process.env.MIX_SENTRY_DSN_PUBLIC

### 系统通知
mix.disableNotifications(); // 禁用系统通知

### 合并自定义配置
mix.webpackConfig({
    resolve: {
        modules: [
            path.resolve(__dirname, 'vendor/laravel/spark/resources/assets/js')
        ]
    }
});

### 复制
mix.copy('node_modules/foo/bar.css', 'public/css/bar.css');
mix.copyDirectory('assets/img', 'public/img');

### 版本化
mix.js('resources/assets/js/app.js', 'public/js')
   .version();
<link rel="stylesheet" href="{{ mix('/css/app.css') }}">

mix.js('resources/assets/js/app.js', 'public/js');

if (mix.inProduction) {
    mix.version();
}

### Browsersync 重新加载
mix.browserSync('my-domain.dev');

mix.browserSync({
    proxy: 'my-domain.dev'
});


## CSS

### less
mix.less('resources/assets/less/app.less', 'public/css'); // 编译到目录
mix.less('resources/assets/less/app.less', 'public/stylesheets/styles.css'); // 编译到文件
mix.less('resources/assets/less/app.less', 'public/css', { // 传递 less 选项
    strictMath: true
});
mix.less('resources/assets/less/app.less', 'public/css')
   .less('resources/assets/less/admin.less', 'public/css');

### sass
mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.sass('resources/assets/sass/app.sass', 'public/css', {
    precision: 5
});

mix.sass('resources/assets/sass/app.sass', 'public/css')
   .sass('resources/assets/sass/admin.sass', 'public/css/admin');

### stylus
mix.stylus('resources/assets/stylus/app.styl', 'public/css');
mix.stylus('resources/assets/stylus/app.styl', 'public/css', { // Rupture
    use: [
        require('rupture')()
    ]
});

### postCSS
mix.sass('resources/assets/sass/app.scss', 'public/css')
   .options({
        postCss: [
            require('postcss-css-variables')()
        ]
   });

### css
mix.styles([
    'public/css/vendor/normalize.css',
    'public/css/vendor/videojs.css'
], 'public/css/all.css');

### url 处理
mix.sass('resources/assets/app/app.scss', 'public/css') // 进制 url 重写
    .options({
        processCssUrls: false
    });

### 资源映射
mix.js('resources/assets/js/app.js', 'public/js')
   .sourceMaps();


## javascript
mix.js('resources/assets/js/app.js', 'public/js');
mix.js('resources/assets/js/app.js', 'public/js')
   .extract(['vue'])

### react
mix.react('resources/assets/js/app.jsx', 'public/js');

### js
mix.scripts([
    'public/js/admin.js',
    'public/js/dashboard.js'
], 'public/js/all.js');

mix.babel([
    'public/js/admin.js',
    'public/js/dashboard.js'
], 'public/js/all.js')


## webpack.mix.js
php artisan preset none # 移除前端脚手架
php artisan preset react

### Vue 组件
文件 resources/assets/js/components/Example.vue
Vue.component('example', require('./components/Example.vue'))

@extends('layouts.app')

@section('content')
    <example></example>
@endsection


## blade

### blade tags
@extends('layouts.app') # 继承
@yield('title') # 变量 声明区块
@section('title', 'Page Title')
@section('sidebar') # 定义区块 声明区块
@endsection
@show # 定义并立即生成该区块
@component('alert')
@component('alert', ['foo' => 'bar'])
@endcomponent
@slot('title')
@endslot
@verbatim
@endverbatim

@if (count($records) === 1)
@elseif (count($records) > 1)
@else
@endif
@unless (Auth::check())
@endunless
@isset($records)
@endisset
@empty($records)
@endempty
@auth
@endauth
@guest
@endguest

@switch
@endswitch
@case
@break
@default

{{ $name }} # 输出 htmlspecialchars 变量
{{ time() }} # 输出 htmlspecialchars 函数
{!! $name !!} # 输出变量
@{{ name }} # 保留原始形态
{{-- 此注释将不会出现在渲染后的 HTML --}} # 注释

@for ( $i = 0; $i < 10; $i++ )
@endfor
@foreach ( $users as $user )
@endforeach
@forelse ( $users as $user )
@empty
@endforelse
@while ( true )
@endwhile
@include('shared.errors')
@include('view.name', ['some' => 'data'])
@includeIf('view.name', ['some' => 'data'])
@includeWhen($boolean, 'view.name', ['some' => 'data'])
@each('view.name', $jobs, 'job')
@each('view.name', $jobs, 'job', 'view.empty')
@push('scripts')
@endpush
@stack('scripts')
@inject('metrics', 'App\Services\MetricsService')

### section
// resources/views/layouts/app.blade.php
<html>
<head>
    <title>应用程序名称 - @yield('title')</title>
</head>
<body>
    @section('sidebar')
        这是主布局的侧边栏。
    @show

    <div class="container">
        @yield('content')
    </div>
</body>
</html>

// resources/views/layouts/child.blade.php
@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    <p>这将追加到主布局的侧边栏。</p>
@endsection

@section('content')
    <p>这是主体内容。</p>
@endsection

### component & slot
// /resources/views/alert.blade.php
<div class="alert alert-danger">
    {{ $slot }}
</div>

@component('alert')
    <strong>Whoops!</strong> Something went wrong!
@endcomponent

// /resources/views/alert.blade.php
<div class="alert alert-danger">
    <div class="alert-title">{{ $title }}</div>

    {{ $slot }}
</div>

@component('alert')
    @slot('title')
        Forbidden
    @endslot

    你没有权限访问这个资源！
@endcomponent

@component('alert', ['foo' => 'bar'])
@endcomponent

### 显示数据
<script>
    var app = @json($array)
</script>
等价于
<script>
    var app = <?php json_encode($array); ?>;
</script>

Hello, {{ $name }}.
The current UNIX timestamp is {{ time() }}.
Hello, @{{ name }}.
Hello, {!! $name !!}.

### JavaScript
<h1>Laravel</h1>

@verbatim # 展示大量 JavaScript 变量
    <div class="container">
        Hello, {{ name }}.
    </div>
@endverbatim

### 条件
@if ( count($records) === 1 )
    我有一条记录！
@elseif ( count($records) > 1 )
    我有多条记录！
@else
    我没有任何记录！
@endif

@unless (Auth::check())
    你尚未登录。
@endunless

@isset($records)
@endisset

@empty($records)
@endempty

@auth
@endauth

@guest
@endguest

@switch($i)
    @case(1)
    @break
    @case(2)
    @break
    @default
@endswitch

### 循环
@for ($i = 0; $i < 10; $i++)
    目前的值为 {{ $i }}
@endfor

@foreach ($users as $user)
    <p>此用户为 {{ $user->id }}</p>
@endforeach

@forelse ($users as $user)
    <li>{{ $user->name }}</li>
@empty
    <p>没有用户</p>
@endforelse

@while (true)
    <p>死循环了。</p>
@endwhile

@foreach ($users as $user)
    @if ($user->type == 1)
        @continue
    @endif

    <li>{{ $user->name }}</li>

    @if ($user->number == 5)
        @break
    @endif
@endforeach

@foreach ($users as $user)
    @continue($user->type == 1)

    <li>{{ $user->name }}</li>

    @break($user->number == 5)
@endforeach

@foreach ($users as $user)
    @if ($loop->first)
        这是第一个迭代。
    @endif

    @if ($loop->last)
        这是最后一个迭代。
    @endif

    <p>This is user {{ $user->id }}</p>
@endforeach

@foreach ($users as $user)
    @foreach ($user->posts as $post)
        @if ($loop->parent->first)
            This is first iteration of the parent loop.
        @endif
    @endforeach
@endforeach

@php # PHP 代码
@endphp

$loop->index        当前循环迭代的索引（从0开始）
$loop->iteration    当前循环迭代 （从1开始）
$loop->remaining    循环中剩余迭代数量
$loop->count        迭代中的数组项目总数
$loop->first        当前迭代是否是循环中的首次迭代
$loop->last         当前迭代是否是循环中的最后一次迭代
$loop->depth        当前循环的嵌套级别
$loop->parent       在嵌套循环中，父循环的变量

<div>
    @include('shared.errors')

    <form>
    </form>
</div>

@push('scripts')
    <script src="/example.js"></script>
@endpush

<head>
    @stack('scripts')
</head>

@inject('metrics', 'App\Services\MetricsService')

<div>
    Monthly Revenue: {{ $metrics->monthlyRevenue() }}.
</div>

<?php
namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    public function boot() {
        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";
        });
    }
    public function boot() {
        Blade::if('env', function ($environment) {
            return app()->environment($environment);
        });
    }
    public function register() {}
}

@env('local')
@else
@endenv