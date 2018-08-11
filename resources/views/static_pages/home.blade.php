@extends('layouts.default')

@section('content')
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
@stop