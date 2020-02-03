@extends('layouts.auth')

@section('content')
    <div class="login-box-body">
        <p class="login-box-msg">Đăng ký hệ thống</p>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="code" value="{{ old('code') }}" class="form-control" placeholder="Mã số sinh viên" required>
                @if ($errors->has('code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('code') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Mật khẩu" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" value="{{ old('password') }}" required class="form-control" placeholder="Nhập lại mật khẩu">
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Xác nhận</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
@endsection
