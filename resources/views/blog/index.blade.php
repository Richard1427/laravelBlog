@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="layui-card-header" id="page_container">文章列表</div>
                <div class="card-body">
                    <table class="layui-table">
                        <thead>
                        <tr>
                            <th>文章标题</th>
                            <th>发布时间</th>
                            <th>相关操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($blogs as $blog)
                            @guest
                                <tr>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->created_at}}</td>
                                    <td>
                                        <button class="layui-btn layui-btn-sm">
                                            <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-info">文章详情</a>
                                        </button>
                                    </td>
                                </tr>
                            @else
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->created_at}}</td>
                                <td>
                                    @if(Auth::user()->id == 1)
                                        <button class="layui-btn layui-btn-sm">
                                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-info">编辑文章</a>
                                        </button>
                                    @endif
                                    <button class="layui-btn layui-btn-sm">
                                        <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-info">文章详情</a>
                                    </button>
                                </td>
                            </tr>
                            @endguest
                        @endforeach
                        </tbody>
                    </table>
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
