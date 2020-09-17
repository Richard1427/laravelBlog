@extends('layouts.app')
@include('components._error')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">文章详情</div>

                <div class="card-body">
                    <h1 class="text-center">{{ $blog->title }}</h1>

                    <p>发布时间<small>{{ $blog->created_at }}</small></p>

                    <hr>

                    <p> {!! $blog->content !!} </p>
                    <h3>评论</h3>
                    <ul>
                        @foreach ($comments as $comment)
                            <li><small>{{ $comment->userName() }} 评论说：</small>“ {{ $comment->content }} ”</li>
                        @endforeach
                    </ul>
                    <form method="POST" action="{{ route('comment.store') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">

                        <div class="form-group">
                            <label for="content"></label>
                            <script id="container" name="content" type="text/plain" width="300px">您有什么看法呢</script>
                        </div>
                        {{-- 样式里面加一个判断，判断是否有关于content的错误有的话给样式给文本域加一个红边边 --}}

                        {{-- 如果有错误，再显示一个小的错误提示信息 --}}
                        @if ($errors->has('content'))
                            <span class="invalid-feedback">
                             <strong>{{ $errors->first('content') }}</strong>
                             </span>
                        @endif
                        <button class="btn btn-primary" type="submit">发表评论</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var ue = UE.getEditor('container'); <!-- 实例化编辑器 -->
    </script>
@endsection
