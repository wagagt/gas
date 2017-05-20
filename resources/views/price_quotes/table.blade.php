<table class="table table-responsive" id="priceQuotes-table">
    <thead>
        <th>Quotation Id</th>
        <th>Number Term</th>
        <th>Quote Value Month</th>
        <th>Insurance Value Month</th>
        <th>Tax Value</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($priceQuotes as $priceQuote)
        <tr>
            <td>{!! $priceQuote->quotation_id !!}</td>
            <td>{!! $priceQuote->number_term !!}</td>
            <td>{!! $priceQuote->quote_value_month !!}</td>
            <td>{!! $priceQuote->insurance_value_month !!}</td>
            <td>{!! $priceQuote->tax_value !!}</td>
            <td>
                {!! Form::open(['route' => ['priceQuotes.destroy', $priceQuote->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('priceQuotes.show', [$priceQuote->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('priceQuotes.edit', [$priceQuote->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>