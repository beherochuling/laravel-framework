# laravel
## auth

### view
auth\register.blade.php
auth\login.blade.php
auth\passwords\email.blade.php
auth\passwords\reset.blade.php

### 
php artisan make:auth
php artisan make:model Models/Admin -m
php artisan make:seeder AdminsTableSeeder

### 模板
csrf_token() csrf 标识
csrf_field() csrf 字段

app()->getLocale() # 语言

config('app.name', 'Laravel') # 配置

asset('css/app.css') # 资源
route('login') # 路由

Auth::routes() # 认证路由
Auth::check() # 是否登录
Auth::user()->name # 认证用户姓名

# 标签
@guest
@else
@endguest

@yield('content')

@extends('layouts.app')
@section('content')


{{ $errors->has('name') ? ' has-error' : '' }}
{{ old('name') }}
$errors->has('name')
{{ $errors->first('name') }}

session('status')

