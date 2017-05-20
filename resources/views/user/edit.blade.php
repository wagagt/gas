@extends('layouts.app')
@section('title', 'Usuarios')

@section('content')
    <section class="content-header">
        <h1>
            User
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}

                        @include('user.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('js')
<script>

    var password = document.getElementById("password");
    var confirm_password = document.getElementById("password_confirm");
    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Contraseñas no coinciden");
        } else {
            confirm_password.setCustomValidity('');
        }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    $(".select-role").select2();

    $("#checkbox").click(function(){
        if($("#checkbox").is(':checked') ){
            $(".select-role > option").prop("selected","selected");
            $(".select-role").trigger("change");
        }else{
            $(".select-role > option").removeAttr("selected");
            $(".select-role").trigger("change");
        }
    });


</script>
@endsection