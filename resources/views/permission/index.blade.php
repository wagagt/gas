@extends('layouts.app')
@section('title', 'Permisos')

@section('content')
    <section class="box-header">
        <h1 class="pull-left">Permisos</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-danger">
            <div class="container-fluid">
                <div class="col-md-6 col-sm-12">

                    <span class="pull-left" style="margin-top:5px; margin-right: 2px">
                            <a href="{!! route('roles.index') !!}"  class="btn btn-primary pull-left"  data-toggle="tooltip"  title="Mantenimiento de Roles"><i class="fa  fa-key"></i></a>
                        </span>

                        <span class="pull-left" style="margin-top:5px; margin-right: 2px" data-toggle="tooltip" title="Nuevo permiso">
                            <button type="button" class="btn btn-primary pull-right"  data-toggle="modal" data-target="#permososModal" title="Nuevo permiso"><i class="fa fa-unlock"></i></button>
                        </span>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="clearfix">
                        {!! Form::open(['route' => 'permissions.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right pull-right', 'role' => 'search']) !!}
                        <div class="form-group">
                            {!! Form::text('permiso', null,['class'=> 'form-control', 'placeholder' => 'Buscar permiso', 'autofocus' ])!!}
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="box-body">
                    @include('permission.table')
            </div>
            <div class="text-center">
                {!! $permissions->render() !!}
            </div>
        </div>
    </div>

    <!-- Modal integrate   -->
    @include('permission.modalCreate')
    <!-- Fin modal-->

@endsection

