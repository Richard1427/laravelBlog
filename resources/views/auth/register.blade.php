@extends('layouts.app')

@section('content')
<div class="layui-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="layui-card">
                <div class="layui-card-header">注册</div>

                <div class="layui-card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="layui-form-item">
                            <label for="name" class="layui-form-label">用户名</label>

                            <div class="layui-input-inline">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label for="email" class="layui-form-label">邮箱</label>

                            <div class="layui-input-inline">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label for="password-confirm" class="layui-form-label">密码确认</label>

                            <div class="layui-input-inline">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div>
                            <label for="" class="layui-form-label">验证码</label>
                            <div class="layui-input-inline">
                                <div>
                                    <input type="test" name="captcha">
                                </div>
                            </div>
                            <div class="">
                                <div>
                                    <img src="{{captcha_src()}}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <div class="col-md-6">
                                <button type="submit" class="layui-btn">
                                    注册
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
