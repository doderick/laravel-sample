@extends('layouts.default')
@section('title', $user->name.'的主页')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-12">
                <!-- 载入用户信息局部视图 -->
                <section class="user_info">
                    @include('shared._user_info', ['user' => $user])
                </section>
            </div>
        </div>
    </div>
@stop