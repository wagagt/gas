<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Property Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_property', 'Status Property:') !!}
    {!! Form::text('status_property', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::number('company_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Range Value Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('range_value_id', 'Range Value Id:') !!}
    {!! Form::number('range_value_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('initialExpenses.index') !!}" class="btn btn-default">Cancel</a>
</div>
