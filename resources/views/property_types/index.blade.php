@extends('layouts.app')
@section('title', 'Tipos de bien')

@section('content')
    <section class="box-header">
        <h1 class="pull-left">Tipos de bien</h1>
    </section>
    <div class="content">
    <div class="clearfix"></div>
        @include('flash::message')

    <div class="box box-danger">
        <div class="container-fluid">

            <div class="col-md-6 col-sm-12">
                    <span class="pull-left" style="margin-top: 5px; margin-right: 5px" >
                            <a href="{{ route('configMenu') }}"  class="btn btn-primary pull-left"  data-toggle="tooltip" title="Regresar al inicio"><i class="fa fa-chevron-left"></i></a>
                        </span>
                <span class="pull-left" style="margin-top: 5px">
                            <button type="button" class="btn btn-primary pull-right"  data-toggle="modal" data-target="#typeModal" title="Nuevo tipo de bien"><i class="fa fa-barcode"></i></button>
                        </span>

            </div>

            <div class="col-md-6 col-sm-12">
                <div class="clearfix">
                    {!! Form::open(['route' => 'propertyTypes.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right pull-right', 'role' => 'search']) !!}
                    <div class="form-group">
                        {!! Form::text('type', null,['class'=> 'form-control', 'placeholder' => 'Buscar tipo', 'autofocus' ])!!}
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="box-body container-fluid">
            @include('property_types.table')
        </div>
        <div class="text-center">
            {!! $Types->render() !!}
        </div>
    </div>
    </div>


    @include('property_types.modalCreate')
@endsection

@section('js')
    <script>

    </script>
@endsection

