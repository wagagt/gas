<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','default')</title>
    @include('layouts.auth_layout.css')
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <img src="{{asset('ui/images/logo-arrend-login.png')}}" alt="">
    </div>

@include('flash::message')

    <!-- /.login-logo -->
    @yield('content')
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@include('layouts.auth_layout.js')
</body>
</html>
