<header class="navbar navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <a href="{{ route('home') }}" id="logo">Sample Ⅴ</a>
                <nav>
                    @if (Auth::check())
                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="#">用户列表</a></li>
                        </ul>
                    @endif
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('help') }}">帮助</a></li>
                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropsown-toggle">
                                    {{ Auth::user()->name }} <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('users.show', Auth::user()->id) }}">个人中心</a></li>
                                    <li><a href="#">编辑资料</a></li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#" id="logout">
                                            <form action="{{ route('logout') }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-block btn-danger">退出</button>
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">登录</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
</header>