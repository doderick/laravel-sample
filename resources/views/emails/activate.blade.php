<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册激活邮件</title>
</head>
<body>
    <h1>感谢您在 Sample 注册</h1>
    <p>
        请点击下面的链接完成账户激活：
        <a href="{{ route('activate_email', [$user->id, $user->activation_token]) }}">
            {{ route('activate_email', [$user->id, $user->activation_token]) }}
        </a>
    </p>
    <p>
        如果这不是您本人的操作，请忽略此邮件。
    </p>
</body>
</html>