<table class="table table-responsive" id="tirRates-table">
    <thead>
        <th>Name</th>
        <th>Currency</th>
        <th>Symbol</th>
        <th>Status Property</th>
        <th>Company Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tirRates as $tirRate)
        <tr>
            <td>{!! $tirRate->name !!}</td>
            <td>{!! $tirRate->currency !!}</td>
            <td>{!! $tirRate->symbol !!}</td>
            <td>{!! $tirRate->status_property !!}</td>
            <td>{!! $tirRate->company_id !!}</td>
            <td>
                {!! Form::open(['route' => ['tirRates.destroy', $tirRate->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tirRates.show', [$tirRate->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tirRates.edit', [$tirRate->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>