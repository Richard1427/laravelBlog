@extends('layouts.app')

@section('content')
    <div class="layui-container">
        <div class="row justify-content-center">
            <div class="layui-col-sm-offset2">
                <div class="layui-card">
                    <div>基本资料</div>
                    <div class="layui-card-header">UID:{{$data->id}}</div>
                    <div>用户名:{{$data->name}}</div>
                    <div>邮箱:{{$data->email}}</div>
                    <div>注册时间:{{$data->created_at}}</div>
                    <div class="layui-card-body">
                        <a href="{{ route('blog.index') }}" class="">主页</a>
                        {{--  这里等下要添加一个跳转到展示文章列表页面的按钮  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
