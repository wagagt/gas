<table class="table table-responsive" id="rangeValueRates-table">
    <thead>
        <th>Initial Value</th>
        <th>Final Value</th>
        <th>Company Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($rangeValueRates as $rangeValueRate)
        <tr>
            <td>{!! $rangeValueRate->initial_value !!}</td>
            <td>{!! $rangeValueRate->final_value !!}</td>
            <td>{!! $rangeValueRate->company_id !!}</td>
            <td>
                {!! Form::open(['route' => ['rangeValueRates.destroy', $rangeValueRate->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('rangeValueRates.show', [$rangeValueRate->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('rangeValueRates.edit', [$rangeValueRate->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>