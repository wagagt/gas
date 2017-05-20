
<!-- User Name Field -->
<div class="form-group col-md-6">
    {!! Form::label('name', 'Permiso:') !!}
    <p>{!! $permission->name !!}</p>
</div>

<!-- First Name Field -->
<div class="form-group col-md-6">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{!! $permission->slug     !!}</p>
</div>

<!-- Last Name Field -->
<div class="form-group col-md-6">
    {!! Form::label('description', 'Descripción:') !!}
    <p>{!! $permission->description !!}</p>
</div>

<!-- Married Surname Field -->
<div class="form-group col-md-6">
    {!! Form::label('model', 'Modelo:') !!}
    <p>{!! $permission->model !!}</p>
</div>

