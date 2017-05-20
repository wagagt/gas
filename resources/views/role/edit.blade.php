@extends('layouts.app')
@section('title', 'Roles')

@section('content')
    <section class="content-header">
        <h1>
            Roles
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-danger">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}

                        @include('role.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('js')
  <script type="text/javascript">
      $(".select-permission").select2();

      $("#box").click(function(){
          if($("#box").is(':checked') ){
              $(".select-permission > option").prop("selected","selected");
              $(".select-permission").trigger("change");
          }else{
              $(".select-permission > option").removeAttr("selected");
              $(".select-permission").trigger("change");
          }
      });


  </script>
@endsection
