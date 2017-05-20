<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('property', 'Nombre:') !!}
    {!! Form::text('property', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
</div>

<!-- Office Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Empresa:') !!}
    {!! Form::select('company_id', $companies, null, ['class' => 'form-control', 'required']) !!}
</div>




<div class="modal-footer">
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::button('<i class="fa fa-floppy-o"></i>', ['type' => 'submit', 'class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Guardar']) !!}
        <a href="{!! route('propertyTypes.index') !!}" class="btn btn-primary" data-toggle="tooltip" title="Cancelar"><i class="fa fa-ban"></i></a>
    </div>
</div>
