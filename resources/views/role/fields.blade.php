<!-- User Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Rol:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
</div>

<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Descripción:') !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Married Surname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('level', 'Nivel:') !!}
    {!! Form::text('level', null, ['class' => 'form-control', 'required']) !!}
</div>

<?php
if(isset($getPermission)){
    $asignPermission = $getPermission;
}else {
    $asignPermission = null;
}
?>

<div class="form-group col-sm-12">
    {!! Form::label('permisos_id[]', 'Permisos') !!}
    {!! Form::select('permisos_id[]', $permisos, $asignPermission, ['class' => 'form-control select-permission', 'multiple',  'style' => 'width:100%', 'required']) !!}
    <input type="checkbox" id="box"> Seleccionar todos los permisos
</div>

<div class="modal-footer">
    <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::button('<i class="fa fa-floppy-o"></i>', ['type' =>'submit', 'class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Guardar']) !!}
            <a href="{!! route('roles.index') !!}" class="btn btn-primary" data-toggle="tooltip" title="Cancelar"><i class="fa fa-ban" ></i></a>
        </div>
</div>
