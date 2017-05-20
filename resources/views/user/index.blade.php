@extends('layouts.app')
@section('title', 'Usuarios')

@section('content')
    <section class="box-header">
        <h1 class="pull-left">Usarios</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-danger">
            <div class="container-fluid">
                <div class="col-md-6 col-sm-12">
                    <span class="pull-left" style="margin-top:5px; margin-right: 2px">
                            <a href="{{ route('configMenu') }}"  class="btn btn-primary pull-left"  data-toggle="tooltip"  title="Ir al inicio"><i class="fa fa-chevron-left" ></i></a>
                        </span>
                     <span class="pull-left" style="margin-top:5px; margin-right: 2px">
                            <a href="{!! route('roles.index') !!}"  class="btn btn-primary pull-left"  data-toggle="tooltip"  title="Mantenimiento de Roles"><i class="fa  fa-key"></i></a>
                        </span>

                        <span class="pull-left" style="margin-top:5px" data-toggle="tooltip" title="Nuevo usuario">
                            <button type="button" class="btn btn-primary pull-right"  data-toggle="modal" data-target="#usuariosModal" ><i class="fa fa-user-plus"></i></button>
                        </span>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="clearfix">
                        {!! Form::open(['route' => 'users.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right pull-right', 'role' => 'search']) !!}
                        <div class="form-group">
                            {!! Form::text('user', null,['class'=> 'form-control', 'placeholder' => 'Buscar usuario', 'autofocus' ])!!}
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="box-body">
                    @include('user.table')
            </div>
            <div class="text-center">
                {!! $users->render() !!}
            </div>
        </div>
    </div>

    <!-- Modal integrate   -->
    @include('user.modalCreate')
    <!-- Fin modal-->

@endsection




@section('js')
    <script>
        var password = document.getElementById("password");
        var confirm_password = document.getElementById("password_confirm");
        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Contraseñas no coinciden");
            } else {
                confirm_password.setCustomValidity('');
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

        $(".select-role").select2();

        $("#checkbox").click(function(){
            if($("#checkbox").is(':checked') ){
                $(".select-role > option").prop("selected","selected");
                $(".select-role").trigger("change");
            }else{
                $(".select-role > option").removeAttr("selected");
                $(".select-role").trigger("change");
            }
        });

    </script>
@endsection

