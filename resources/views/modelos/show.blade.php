@extends('layouts.app')
@section('title', 'Modelos')

@section('content')
    <section class="content-header">
        <h1>
            Ficha modelo
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('modelos.show_fields')
                    <div class="modal-footer"></div>
                    <a href="{!! route('modelos.index') !!}" class="btn btn-danger"><i class="fa fa-chevron-left"></i> Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
