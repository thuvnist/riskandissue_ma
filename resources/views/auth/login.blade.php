@extends('layouts.auth')

@section('content')
    <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập hệ thống</p>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Mật khẩu">
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Đăng nhập</button>
                </div>
                <!-- /.col -->
            </div>
            <div class="row" style="margin-top: 10px">
                <!-- /.col -->
                <div class="col-xs-12">
                    <a href="{{ route('register') }}" class="btn btn-primary btn-block btn-flat">Đăng ký</a>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>

@endsection
