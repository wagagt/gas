@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')
    <section class="content-header">
        <h1>
            Ficha de usuario
    </section>
    <div class="content">
        <div class="box box-danger">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('user.show_fields')
                    <div class="modal-footer"></div>
                    <a href="{!! route('users.index') !!}" class="btn btn-danger"><i class="fa fa-chevron-left"></i> Regresar</a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(".select-role").select2();
</script>
@endsection
