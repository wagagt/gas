@extends('layouts.app')
@section('title', 'Roles')
@section('content')
    <section class="content-header">
        <h1>
            Ficha del Rol
        </h1>
    </section>
    <div class="content">
        <div class="box box-danger">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('role.show_fields')
                    <div class="modal-footer"></div>
                    <a href="{!! route('roles.index') !!}" class="btn btn-danger"><i class="fa fa-chevron-left"></i> Regresar</a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
  <script type="text/javascript">
  $(".select-permission").select2();

  </script>
@endsection
