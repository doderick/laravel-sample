@extends('layouts.default')
@section('title', '重置密码申请')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>重置密码</h5>
            </div>
            <div class="panel-body">
                <!-- 引入错误信息视图 -->
                @include('shared._errors')

                <form action="{{ route('password.email') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">邮箱：</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="请输入您的邮箱地址" autofocus>
                    </div>

                    <button type="submit" class="btn btn-primary">发送密码重置邮件</button>
                </form>
            </div>
        </div>
    </div>
@stop