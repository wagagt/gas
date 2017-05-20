<!-- Customer Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_name', 'Customer Name:') !!}
    {!! Form::text('customer_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_phone', 'Customer Phone:') !!}
    {!! Form::text('customer_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_mobile', 'Customer Mobile:') !!}
    {!! Form::text('customer_mobile', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::number('company_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Property Equipment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('property_equipment_id', 'Property Equipment Id:') !!}
    {!! Form::number('property_equipment_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_value', 'Price Value:') !!}
    {!! Form::number('price_value', null, ['class' => 'form-control']) !!}
</div>

<!-- Initial Fee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('initial_fee', 'Initial Fee:') !!}
    {!! Form::number('initial_fee', null, ['class' => 'form-control']) !!}
</div>

<!-- Aplay Tax Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aplay_tax', 'Aplay Tax:') !!}
    {!! Form::number('aplay_tax', null, ['class' => 'form-control']) !!}
</div>

<!-- Tir Rate Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tir_rate_id', 'Tir Rate Id:') !!}
    {!! Form::number('tir_rate_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Purchase Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('purchase_id', 'Purchase Id:') !!}
    {!! Form::number('purchase_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Tax Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax', 'Tax:') !!}
    {!! Form::number('tax', null, ['class' => 'form-control']) !!}
</div>

<!-- Executive Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('executive_id', 'Executive Id:') !!}
    {!! Form::number('executive_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Vendor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendor_id', 'Vendor Id:') !!}
    {!! Form::number('vendor_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Sales Agent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sales_agent_id', 'Sales Agent Id:') !!}
    {!! Form::number('sales_agent_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Currency Symbol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency_symbol', 'Currency Symbol:') !!}
    {!! Form::text('currency_symbol', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('quotations.index') !!}" class="btn btn-default">Cancel</a>
</div>
