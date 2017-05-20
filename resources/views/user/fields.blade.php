<!-- User Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_name', 'Usuario:') !!}
    {!! Form::text('user_name', null, ['class' => 'form-control', 'autofocus', 'required', 'placeholder' => 'Ingrese un nombre de usuario que no exista']) !!}
</div>

<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'Nombres: ') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control','required', 'placeholder' => 'Primero, segundo y tercer nombre si se tiviere']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Apellidos:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control', 'required',  'placeholder' => 'Primer y segundo apellido']) !!}
</div>

<!-- Married Surname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('married_surname', 'Apllido de casada:') !!}
    {!! Form::text('married_surname', null, ['class' => 'form-control', 'placeholder' => 'Apellido de casada (opcional)']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('email', 'Correo electrónico:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ej: mi.correo@gmail.com']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('full_name', 'Nombre completo') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control', 'disabled']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('password', 'Asignar contraseña:') !!}
    {!! Form::password('password',  ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('password_confirm', 'Confirmar contraseña:') !!}
    {!! Form::password('password_confirm',  ['class' => 'form-control']) !!}
</div>

<?php
if(isset($getRoles)){
     $asignRoles = $getRoles;
}
else{
     $asignRoles = null;
}

?>


<div class="form-group col-sm-12">
    {!! Form::label('roles_id[]', 'Asignar roles') !!}
    {!! Form::select('roles_id[]', $roles, $asignRoles ,['class' => 'form-control select-role', 'multiple', 'style' => 'width:100%', 'required']) !!}
    <input type="checkbox" id="checkbox"> Seleccionar todos los roles
</div>


<div class="modal-footer">
    <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::button('<i class="fa fa-floppy-o"></i>', ['type' =>'submit', 'class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Guardar']) !!}
            <a href="{!! route('users.index') !!}" class="btn btn-primary" data-toggle="tooltip" title="Cancelar"><i class="fa fa-ban" ></i></a>
        </div>
</div>