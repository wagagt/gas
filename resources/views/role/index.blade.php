@extends('layouts.app')
@section('title', 'Roles')

@section('content')
    <section class="box-header">
        <h1 class="pull-left">Roles</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-danger">
            <div class="container-fluid">
                <div class="col-md-6 col-sm-12">

                        <span class="pull-left" style="margin-top: 5px; margin-right: 2px" data-toggle="tooltip" title="Mantenimiento de usuarios">
                            <a href="{{ route('users.index') }}"  class="btn btn-primary pull-right" ><i class="fa fa-users"></i></a>
                        </span>

                        <span class="pull-left" style="margin-top: 5px; margin-right: 2px" data-toggle="tooltip" title="Mantenimiento de permisos">
                            <a href="{{ route('permissions.index') }}"  class="btn btn-primary pull-right" ><i class="fa fa-unlock"></i></a>
                        </span>


                        <span class="pull-left" style="margin-top: 5px;" data-toggle="tooltip" title="Nuevo rol">
                            <button type="button" class="btn btn-primary pull-right"  data-toggle="modal" data-target="#rolesModal"><i class="fa fa-key" ></i></button>
                        </span>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="clearfix">
                        {!! Form::open(['route' => 'roles.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right pull-right', 'role' => 'search']) !!}
                        <div class="form-group">
                            {!! Form::text('role', null,['class'=> 'form-control', 'placeholder' => 'Buscar rol', 'autofocus' ])!!}
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="box-body">
                    @include('role.table')
            </div>
            <div class="text-center">
                {!! $roles->render() !!}
            </div>
        </div>
    </div>

    <!-- Modal integrate   -->
    @include('role.modalCreate')
    <!-- Fin modal-->

@endsection

@section('js')
    <script type="text/javascript">
        $(".select-permission").select2();


        $("#box").click(function(){
            if($("#box").is(':checked') ){
                $(".select-permission > option").prop("selected","selected");
                $(".select-permission").trigger("change");
            }else{
                $(".select-permission > option").removeAttr("selected");
                $(".select-permission").trigger("change");
            }
        });


    </script>
@endsection

