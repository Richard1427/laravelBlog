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
                          @foreach ($res as $row)
                            <tr>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->created_at}}</td>
                                <td>
                                <button class="layui-btn layui-btn-sm">
                                    <a href="{{ route('blog.edit', $row->id) }}" class="btn btn-info">编辑文章</a>
                                </button>
                                    <button class="layui-btn layui-btn-sm">
                                        <a href="{{ route('blog.show', $row->id) }}" class="btn btn-info">文章详情</a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                    {{ $res->links() }}--}}
                    <div>
                        共 {{$res->total()}}条记录
                    </div>
                    <div>
                        {{$res->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
