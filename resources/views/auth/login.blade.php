@extends('layouts.app')

@section('content')
<div class="layui-container">
    <div class="layui-row">
        <div class="layui-tab">
            <div class="layui-card">
                <div class="layui-card-header">登陆</div>

                <div class="layui-card-body">
                    <form method="POST" action="{{ route('login') }}" class="layui-form layui-form-pane" >
                        @csrf
                        <div class="layui-form-item">
                            <label for="email" class="layui-form-label">邮箱</label>

                            <div class="layui-input-inline">
                                <input id="email" type="email" class="layui-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label for="password" class="layui-form-label">密码</label>

                            <div class="layui-input-inline">
                                <input id="password" type="password" class="layui-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <div class="">
                                <div class="form-check">
                                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="layui-form-label" for="remember">
                                        记住我
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <div class="layui-input-inline">
                                <button type="submit" class="layui-btn">
                                    登陆
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
