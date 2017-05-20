@extends('layouts.app')
@section('title', 'Empresas')

@section('content')
    <section class="box-header">
        <h1 class="pull-left">Empresas</h1>
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
                            <button type="button" class="btn btn-primary pull-right"  data-toggle="modal" data-target="#companyModal" title="Nueva empresa"><i class="fa fa-flag"></i></button>
                        </span>

            </div>

            <div class="col-md-6 col-sm-12">
                <div class="clearfix">
                    {!! Form::open(['route' => 'companies.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right pull-right', 'role' => 'search']) !!}
                    <div class="form-group">
                        {!! Form::text('company', null,['class'=> 'form-control', 'placeholder' => 'Buscar empresa', 'autofocus' ])!!}
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="box-body container-fluid">
            @include('companies.table')
        </div>
        <div class="text-center">
            {!! $companies->render() !!}
        </div>
    </div>
    </div>


    @include('companies.modalCreate')
@endsection

@section('js')
    <script>
        $(documet).ready(function(){
            $(".select-country").select2({
                placeholder: "Seleccione un país",
                allowClear: true
            });

        });
    </script>
@endsection

