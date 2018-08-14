@extends('layouts.default')
@section('title', $user->name.'的主页')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-12">
                <div class="col-md-8 col-md-offset-2">
                    <!-- 引入用户信息局部视图 -->
                    <section class="user_info">
                        @include('shared._user_info', ['user' => $user])
                    </section>
                    <!-- 引入个人统计信息视图 -->
                    <section class="stats">
                        @include('shared._stat', ['user' => $user])
                    </section>
                </div>
            </div>
            <!-- 引入关注表单视图 -->
            <div class="col-md-12">
                @if (Auth::check())
                    @include('users._follow_form')
                @endif
            </div>
            <div class="col-md-12">
                @if (count($statuses))
                    <ol class="statuses">
                        @foreach ($statuses as $status)
                            @include('statuses._status')
                        @endforeach
                    </ol>
                    {!! $statuses->render() !!}
                @endif
            </div>
        </div>
    </div>
@stop