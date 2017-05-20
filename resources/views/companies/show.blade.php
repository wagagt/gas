@extends('layouts.app')
@section('title', 'Empresas')

@section('content')
    <section class="content-header">
        <h1>
            Ficha de empresa
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('companies.show_fields')
                    <div class="modal-footer"></div>
                    <a href="{!! route('companies.index') !!}" class="btn btn-danger"><i class="fa fa-chevron-left"></i> Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
