<table class="table table-responsive" id="ratePurchases-table">
    <thead>
        <th>Name</th>
        <th>Range Value Id</th>
        <th>Status Property</th>
        <th>Company Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($ratePurchases as $ratePurchase)
        <tr>
            <td>{!! $ratePurchase->name !!}</td>
            <td>{!! $ratePurchase->range_value_id !!}</td>
            <td>{!! $ratePurchase->status_property !!}</td>
            <td>{!! $ratePurchase->company_id !!}</td>
            <td>
                {!! Form::open(['route' => ['ratePurchases.destroy', $ratePurchase->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ratePurchases.show', [$ratePurchase->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ratePurchases.edit', [$ratePurchase->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>