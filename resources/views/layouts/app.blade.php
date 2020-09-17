<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>我的博客</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/layui.css">
    <script src="/js/layui.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }} ;" charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <!--ueditor-->
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.js"></script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/lang/zh-cn/zh-cn.js"></script>
</head>

<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="layui-nav layui-bg-cyan">
                    <li class="layui-nav-item">
                        <a class="navbar-brand" href="{{ url('/') }}">我的博客</a>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        <li class="layui-nav-item">
                            <a class=" " href="{{ route('login') }}">登陆</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="layui-nav-item">
                                <a class=" " href="{{ route('register') }}">注册</a>
                            </li>
                        @endif
                    @else
                        <li class="layui-nav-item ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/blog" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                        </li>
                        {{-- route('路由别名') 在视图上就是一个指向 BlogController@create 的链接 --}}
                        @if(Auth::user()->id == 1)
                            <li class="layui-nav-item ">
                                <a href="{{ route('blog.create') }}" class="dropdown-item"> 添加文章 </a>
                            </li>
                        @endif
                        <li class="layui-nav-item ">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">退出登录</a>
                        </li>
                        <li class="layui-nav-item"><a href="javascript:;">解决方案</a>
                            <dl class="layui-nav-child">
                                <dd><a href="">移动模块</a></dd>
                                <dd><a href="">后台模版</a></dd>
                                <dd><a href="">电商平台</a></dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <form method="get" action="search">
                                <input type="text" name="keyword" >
                                <span>
                                     <button onclick="" class="layui-btn-sm" style="background-color:#5FB878; border-radius: 5px; color: #ffffff " type="submit">搜索</button>
                                </span>
                            </form>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
<script>
    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function () {
        var element = layui.element;

        //…
    });


</script>
