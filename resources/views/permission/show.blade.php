@extends('layouts.app')
@section('title', 'Permisos')
@section('content')
    <section class="content-header">
        <h1>
            Ficha del permiso
        </h1>
    </section>
    <div class="content">
        <div class="box box-danger">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('permission.show_fields')
                    <div class="modal-footer"></div>
                    <a href="{!! route('permissions.index') !!}" class="btn btn-danger"><i class="fa fa-chevron-left"></i> Regresar</a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
