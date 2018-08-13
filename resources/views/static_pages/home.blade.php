@extends('layouts.default')

@section('content')
    @if (Auth::check())
    <!-- 登录用户 -->
        <div class="row">
            <div class="col-md-8">
                <!-- 引入动态发布表单 -->
                <section>
                    @include('shared._status_form')
                </section>
                <h3>动态列表</h3>
                @include('shared._feed')
            </div>
            <!-- 边栏 -->
            <aside class="col-md-4">
                <!-- 引入用户个人信息视图 -->
                <section class="user_info">
                    @include('shared._user_info', ['user' => Auth::user()])
                </section>
            </aside>
        </div>
    @else
    <!-- 游客用户 -->
        <div class="jumbotron">
            <h1>你好，小伙伴！</h1>
            <p>
                你现在所看到的是 <a href="https://laravel-china.org/courses/laravel-essential-training-5.5" target="_blank">Laravel 入门教程</a> 的示例项目主页。
            </p>
            <p>
                一切，将从这里开始。
            </p>
            <p>
                <a href="{{ route('signup') }}" role="button" class="btn btn-lg btn-success">现在注册</a>
            </p>
        </div>
    @endif
@stop