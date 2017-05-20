<table class="table table-responsive" id="initialExpenses-table">
    <thead>
        <th>Description</th>
        <th>Status Property</th>
        <th>Company Id</th>
        <th>Range Value Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($initialExpenses as $initialExpense)
        <tr>
            <td>{!! $initialExpense->description !!}</td>
            <td>{!! $initialExpense->status_property !!}</td>
            <td>{!! $initialExpense->company_id !!}</td>
            <td>{!! $initialExpense->range_value_id !!}</td>
            <td>
                {!! Form::open(['route' => ['initialExpenses.destroy', $initialExpense->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('initialExpenses.show', [$initialExpense->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('initialExpenses.edit', [$initialExpense->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>