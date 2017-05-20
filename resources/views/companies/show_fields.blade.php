
<!-- Name Field -->
<div class="form-group col-md-6">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{!! $company->name !!}</p>
</div>

<!-- Office Phone Field -->
<div class="form-group col-md-6">
    {!! Form::label('office_phone', 'Teléfono:') !!}
    <p>{!! $company->office_phone !!}</p>
</div>

<!-- Address Field -->
<div class="form-group col-md-6">
    {!! Form::label('address', 'Dirección:') !!}
    <p>{!! $company->address !!}</p>
</div>

<!-- Country Id Field -->
<div class="form-group col-md-6">
    {!! Form::label('country_id', 'País:') !!}
    <p>{!! $company->country->name !!}</p>
</div>

