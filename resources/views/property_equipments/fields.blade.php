<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Properties Field -->
<div class="form-group col-sm-6">
    {!! Form::label('properties', 'Properties:') !!}
    {!! Form::text('properties', null, ['class' => 'form-control']) !!}
</div>

<!-- Modelo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modelo_id', 'Modelo Id:') !!}
    {!! Form::number('modelo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Mark Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mark_id', 'Mark Id:') !!}
    {!! Form::number('mark_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Line Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('line_id', 'Line Id:') !!}
    {!! Form::number('line_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Color Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color', 'Color:') !!}
    {!! Form::text('color', null, ['class' => 'form-control']) !!}
</div>

<!-- Uploads Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uploads', 'Uploads:') !!}
    {!! Form::text('uploads', null, ['class' => 'form-control']) !!}
</div>

<!-- Property Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('property_type_id', 'Property Type Id:') !!}
    {!! Form::number('property_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('propertyEquipments.index') !!}" class="btn btn-default">Cancel</a>
</div>
