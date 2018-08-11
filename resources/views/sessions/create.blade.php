@extends('layouts.default')
@section('title', '用户登录')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>用户登录</h5>
            </div>
            <div class="panel-body">
                <!-- 引入错误信息视图 -->
                @include('shared._errors')

                <form action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="请输入邮箱地址" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">密码 (<a href="#"> 忘记密码？</a>)：</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="请输入密码">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember_me">请记住我
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">登录</button>
                </form>

                <hr />
                <p>
                    还没有账号？<a href="{{ route('signup') }}">现在注册！</a>
                </p>
            </div>
        </div>
    </div>
@stop