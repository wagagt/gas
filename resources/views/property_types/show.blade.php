@extends('layouts.app')
@section('title', 'Tipos de bien')

@section('content')
    <section class="content-header">
        <h1>
            Ficha del tipo de bien
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('property_types.show_fields')
                    <div class="modal-footer"></div>
                    <a href="{!! route('propertyTypes.index') !!}" class="btn btn-danger"><i class="fa fa-chevron-left"></i> Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
