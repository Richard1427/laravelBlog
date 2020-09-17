@extends('layouts.app')

@section('content')
    <div class="layui-container">
        <div class="row justify-content-center">
            <div class="layui-col-sm-offset2">
                <div class="layui-card">
                    <div class="layui-card-header">欢迎！这里是Richard的个人博客</div>

                    <div class="layui-card-body">
                        <a href="{{ route('blog.index') }}" class="">点击这里查看我的博客</a>
                        {{--  这里等下要添加一个跳转到展示文章列表页面的按钮  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
