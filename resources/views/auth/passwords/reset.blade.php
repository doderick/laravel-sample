@extends('layouts.default')
@section('title', '更新密码')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>更新您的密码</h5>
            </div>
            <div class="panel-body">
                <!-- 引入错误消息视图 -->
                @include('shared._errors')


                <form action="{{ route('password.update') }}" method="post">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">邮箱：</label>
                        <input type="text" name="email" class="form-control" value="{{ $email or old('email') }}" placeholder="请输入您的邮箱地址" autofocus>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">新密码：</label>
                        <input type="password" name="password" class="form-control" value="{{ $password or old('password') }}" placeholder="请输入新密码">
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password_confirmation" class="control-label">确认密码：</label>
                        <input type="password" name="password_confirmation" class="form-control" value="{{ $password_confirmation or old('password_confirmation') }}" placeholder="请再次输入新密码">
                    </div>

                    <button type="submit" class="btn btn-primary">提交</button>
                </form>
            </div>
        </div>
    </div>
@stop