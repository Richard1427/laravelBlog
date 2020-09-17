@extends('layouts.app')
@section('content')
    <div class="layui-form">
        <div class="row justify-content-center">
            <div class="card">
                <div class="layui-card-header">编辑文章</div>
                <div class="layui-card-body">
                    {{-- action需要声明当前编辑的文章编号$blog->id --}}
                    <form method="POST" action="{{ route('blog.update', $blog->id) }}">
                        {{--  声明 csrf 令牌  --}}
                        @csrf
                        {{--  伪造 PATCH 方法  --}}
                        @method("PATCH")
                        <div class="layui-form-item">
                            <label class="" for="title">文章标题</label>
                            <input type="text" class="" id="title" placeholder="请输入文章标题" name="title" value="{{ $blog->title }}" class="layui-input">
                        </div>
                        <div class="layui-form-item">
                            <label for="content">文章内容</label>
                            <!-- 加载编辑器的容器 -->
                            <script id="container" name="content" type="text/plain">{!! $blog->content !!}</script>
{{--                            <textarea id="content" cols="30" rows="10" class="form-control" name="content"></textarea>--}}
                        </div>
                        <p>发表于<small>{{ $blog->created_at }}</small></p>
                        <p>修改于<small>{{ $blog->updated_at }}</small></p>
                        <button class="btn btn-primary" type="submit">确认编辑</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var ue = UE.getEditor('container'); <!-- 实例化编辑器 -->
    </script>
@endsection
