@extends('layouts.app')
@section('title', 'Lineas')

@section('content')
    <section class="content-header">
        <h1>
            Ficha Linea
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('lines.show_fields')
                    <div class="modal-footer"></div>
                    <a href="{!! route('lines.index') !!}" class="btn btn-danger"><i class="fa fa-chevron-left"></i> Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
