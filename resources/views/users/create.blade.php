@extends('layouts.default')
@section('title', '新用户注册')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>欢迎新童鞋</h5>
            </div>
            <div class="panel-body">
                <!-- 引入错误信息视图 -->
                @include('shared._errors')

                <form action="{{ route('users.store') }}" method="POSt">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">用户名：</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="请输入用户名" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="请输入邮箱地址">
                    </div>
                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="请输入密码">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">确认密码：</label>
                        <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" placeholder="请再次输入密码">
                    </div>

                    <button type="submit" class="btn btn-primary">提交</button>
                </form>
            </div>
        </div>
    </div>
@stop