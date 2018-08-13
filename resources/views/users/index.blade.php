@extends('layouts.default')
@section('title', '用户列表')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>用户列表</h1>
        <ul class="users">
            @foreach ($users as $user)

                <!-- 引入用户局部视图 -->
                @include('users._user')

            @endforeach
        </ul>

        {!! $users->render() !!}
    </div>
@stop