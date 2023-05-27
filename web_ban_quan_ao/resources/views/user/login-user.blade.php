@extends('dashboard')

@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Đăng nhập</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                            <hr>
                            <p class="text-center">Chưa có tài khoản? <a href="{{ route('register-user') }}" data-toggle="modal" data-target="#registerModal">Đăng ký</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

