<!-- Quotation Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quotation_id', 'Quotation Id:') !!}
    {!! Form::number('quotation_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Number Term Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number_term', 'Number Term:') !!}
    {!! Form::number('number_term', null, ['class' => 'form-control']) !!}
</div>

<!-- Quote Value Month Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quote_value_month', 'Quote Value Month:') !!}
    {!! Form::number('quote_value_month', null, ['class' => 'form-control']) !!}
</div>

<!-- Insurance Value Month Field -->
<div class="form-group col-sm-6">
    {!! Form::label('insurance_value_month', 'Insurance Value Month:') !!}
    {!! Form::number('insurance_value_month', null, ['class' => 'form-control']) !!}
</div>

<!-- Tax Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax_value', 'Tax Value:') !!}
    {!! Form::number('tax_value', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('priceQuotes.index') !!}" class="btn btn-default">Cancel</a>
</div>
