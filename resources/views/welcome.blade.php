@extends('layouts.app')
@section('title', 'Selección de empresa')
@section('content')
    <div class="col-md-4" style="margin-top: 25px"></div>
    <div class="col-md-4" style="margin-top: 25px">
        <div class="box box-danger" >
            <div class="box-header">
                <h3 class="box-title">
                    Seleccione un país
                </h3>
                <div class="box-body">

                    {!! Form::open(['route' => 'homeIndex', 'method' => 'POST']) !!}
                    {!! Form::select('empresa',$empresas, null,['class' =>'form-control']) !!}
                    <div class="form-group modal-footer">
                        {!! Form::button('<i class="fa fa-paper-plane"></i>
    ', ['type' => 'submit', 'class' => 'btn btn-primary btn-large', 'data-toggle' => 'tooltip', 'title' => 'Enviar']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4" style="margin-top: 25px"></div>
@endsection
