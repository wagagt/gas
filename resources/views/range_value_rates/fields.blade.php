<!-- Initial Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('initial_value', 'Initial Value:') !!}
    {!! Form::number('initial_value', null, ['class' => 'form-control']) !!}
</div>

<!-- Final Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('final_value', 'Final Value:') !!}
    {!! Form::number('final_value', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::number('company_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('rangeValueRates.index') !!}" class="btn btn-default">Cancel</a>
</div>
