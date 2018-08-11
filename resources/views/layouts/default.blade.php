<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>@yield('title', 'Sample Ⅴ') - Laravel 新手教程第五遍</title>
</head>
<body>
    <!-- 引入header -->
    @include('layouts._header')

    <!-- 引入主体部分 -->
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <!-- 引入消息视图 -->
            @include('shared._message')

            @yield('content')
        </div>
    </div>

    <!-- 引入footer -->
    @include('layouts._footer')
</body>
    <script src="/js/app.js"></script>
</html>