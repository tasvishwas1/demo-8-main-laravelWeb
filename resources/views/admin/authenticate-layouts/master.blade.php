<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>Cuba - Premium Admin Template</title>
    @include('admin.authenticate-layouts.css')
</head>
<body>
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div>
                            <a class="logo" href="index.html">
                                <img class="img-fluid for-light" src="{{ asset('assets/images/logo/login.png') }}"
                                     alt="looginpage">
                                <img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}"
                                     alt="looginpage">
                            </a>
                        </div>
                        <div class="login-main">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.authenticate-layouts.script')

</body>
</html>
