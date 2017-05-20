<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Weekly Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weekly_rate', 'Weekly Rate:') !!}
    {!! Form::number('weekly_rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Monthly Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monthly_rate', 'Monthly Rate:') !!}
    {!! Form::number('monthly_rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Quarterly Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quarterly_rate', 'Quarterly Rate:') !!}
    {!! Form::number('quarterly_rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Biannual Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('biannual_rate', 'Biannual Rate:') !!}
    {!! Form::number('biannual_rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Annual Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('annual_rate', 'Annual Rate:') !!}
    {!! Form::number('annual_rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Property Equipment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('property_equipment_id', 'Property Equipment Id:') !!}
    {!! Form::number('property_equipment_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Range Value Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('range_value_id', 'Range Value Id:') !!}
    {!! Form::number('range_value_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::number('company_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('insuranceRates.index') !!}" class="btn btn-default">Cancel</a>
</div>
