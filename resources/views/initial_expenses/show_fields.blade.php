<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $initialExpense->id !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $initialExpense->description !!}</p>
</div>

<!-- Status Property Field -->
<div class="form-group">
    {!! Form::label('status_property', 'Status Property:') !!}
    <p>{!! $initialExpense->status_property !!}</p>
</div>

<!-- Company Id Field -->
<div class="form-group">
    {!! Form::label('company_id', 'Company Id:') !!}
    <p>{!! $initialExpense->company_id !!}</p>
</div>

<!-- Range Value Id Field -->
<div class="form-group">
    {!! Form::label('range_value_id', 'Range Value Id:') !!}
    <p>{!! $initialExpense->range_value_id !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $initialExpense->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $initialExpense->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $initialExpense->updated_at !!}</p>
</div>

