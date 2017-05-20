
<!-- Name Field -->
<div class="form-group col-md-6">
    {!! Form::label('property', 'Nombre:') !!}
    <p>{!! $propertyType->property !!}</p>
</div>


<!-- Country Id Field -->
<div class="form-group col-md-6">
    {!! Form::label('country_id', 'País:') !!}
    <p>{!! $propertyType->company->name !!}</p>
</div>

