<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Empresa:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
</div>

<!-- Office Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('office_phone', 'Teléfono:') !!}
    {!! Form::text('office_phone', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Dirección:') !!}
    {!! Form::text('address', null, ['class' => 'form-control',  'required']) !!}
</div>

<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', 'País:') !!}
    {!! Form::select('country_id', $countries, null,  ['class' => 'form-control select-country', 'required', 'style' => 'width:100%']) !!}
</div>

<div class="modal-footer">
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::button('<i class="fa fa-floppy-o"></i>', ['type' => 'submit', 'class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Guardar']) !!}
        <a href="{!! route('companies.index') !!}" class="btn btn-primary" data-toggle="tooltip" title="Cancelar"><i class="fa fa-ban"></i></a>
    </div>
</div>
