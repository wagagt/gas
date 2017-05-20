<table class="table table-responsive" id="quotations-table">
    <thead>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Customer Phone</th>
        <th>Customer Mobile</th>
        <th>Company Id</th>
        <th>Property Equipment Id</th>
        <th>Price Value</th>
        <th>Initial Fee</th>
        <th>Aplay Tax</th>
        <th>Tir Rate Id</th>
        <th>Purchase Id</th>
        <th>Tax</th>
        <th>Executive Id</th>
        <th>Vendor Id</th>
        <th>Sales Agent Id</th>
        <th>Currency Symbol</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($quotations as $quotation)
        <tr>
            <td>{!! $quotation->customer_name !!}</td>
            <td>{!! $quotation->email !!}</td>
            <td>{!! $quotation->customer_phone !!}</td>
            <td>{!! $quotation->customer_mobile !!}</td>
            <td>{!! $quotation->company_id !!}</td>
            <td>{!! $quotation->property_equipment_id !!}</td>
            <td>{!! $quotation->price_value !!}</td>
            <td>{!! $quotation->initial_fee !!}</td>
            <td>{!! $quotation->aplay_tax !!}</td>
            <td>{!! $quotation->tir_rate_id !!}</td>
            <td>{!! $quotation->purchase_id !!}</td>
            <td>{!! $quotation->tax !!}</td>
            <td>{!! $quotation->executive_id !!}</td>
            <td>{!! $quotation->vendor_id !!}</td>
            <td>{!! $quotation->sales_agent_id !!}</td>
            <td>{!! $quotation->currency_symbol !!}</td>
            <td>
                {!! Form::open(['route' => ['quotations.destroy', $quotation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('quotations.show', [$quotation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('quotations.edit', [$quotation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>