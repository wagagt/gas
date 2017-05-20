<!-- User Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('name', 'Permiso:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'autofocus']) !!}
</div>

<!-- First Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('description', 'Descripción:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>


<div class="modal-footer">
    <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::button('<i class="fa fa-floppy-o"></i>', ['type' =>'submit', 'class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Guardar']) !!}
            <a href="{!! route('permissions.index') !!}" class="btn btn-primary" data-toggle="tooltip" title="Cancelar"><i class="fa fa-ban" ></i></a>
        </div>
</div>

