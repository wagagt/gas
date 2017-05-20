
<!-- User Name Field -->
<div class="form-group col-md-6">
    {!! Form::label('name', 'Rol:') !!}
    <p>{!! $role->name !!}</p>
</div>

<!-- First Name Field -->
<div class="form-group col-md-6">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{!! $role->slug  !!}</p>
</div>

<!-- Last Name Field -->
<div class="form-group col-md-6">
    {!! Form::label('description', 'Descripción:') !!}
    <p>{!! $role->description !!}</p>
</div>

<!-- Married Surname Field -->
<div class="form-group col-md-6">
    {!! Form::label('model', 'Nivel:') !!}
    <p>{!! $role->level !!}</p>
</div>
<div class="form-group col-md-12">
  {!! Form::label('permiso[]', 'Permisos del rol') !!}
  {!! Form::select('permiso[]', $permisos, $getPermissions, ['class' => 'form-control select-permission', 'multiple', 'disabled', 'style' => 'width:100%'])!!}

</div>
