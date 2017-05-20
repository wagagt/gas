@extends('layouts.auth_layout.loginbase')
@section('title', 'Incio de sesión')

@section('content')
    <div class="login-box-body">
        <p class="login-box-msg">Ingrese sus credenciales para iniciar sesión</p>

        <form method="post" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('user_name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="user_name" value="{{ old('user_name') }}" placeholder="Usuario" autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('user_name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('user_name') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Contraseña" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif

            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">

                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-success btn-block ">Ingresar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- a href="{--{ url('/password/reset') }}">¿Ha olvidado su contraseña?</a><br -->


    </div>
@endsection
