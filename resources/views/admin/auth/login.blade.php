@extends('admin.authenticate-layouts.master')
@section('content')

    <form class="theme-form" role="form" id="addEditForm" method="POST">
        @csrf
        <h4>Sign in to account</h4>
        <p>Enter your email & password to login</p>
        <div class="form-group">
            <label class="col-form-label">Email Address</label>
            <input class="form-control" type="email" name="email" required="" placeholder="Test@gmail.com">
        </div>
        <div class="form-group">
            <label class="col-form-label">Password</label>
            <div class="form-input position-relative">
                <input class="form-control" type="password" name="password" required="" placeholder="*********">
                <div class="show-hide"><span class="show">                  </span></div>
            </div>
        </div>
        <div class="form-group mb-0">
            <div class="checkbox p-0">
                <input id="checkbox1" type="checkbox">
                <label class="text-muted" for="checkbox1">Remember password</label>
            </div>
            <a class="link" href="forget-password.html">Forgot password?</a>
            <div class="text-end mt-3">
                <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
            </div>
        </div>
        <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="sign-up.html">Create Account</a></p>
    </form>

@endsection()

@section('js')
    <script>
        var formUrl = '/login-check';
        var redirect_url = '/dashboard';
    </script>
    <script src="{{ asset('assets/form.js') }}"></script>
@endsection
