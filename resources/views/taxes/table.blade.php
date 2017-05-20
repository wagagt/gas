<table class="table table-responsive" id="taxes-table">
    <thead>
        <th>Description</th>
        <th>Percentage</th>
        <th>Validate</th>
        <th>Expires</th>
        <th>Status</th>
        <th>Company Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($taxes as $tax)
        <tr>
            <td>{!! $tax->description !!}</td>
            <td>{!! $tax->percentage !!}</td>
            <td>{!! $tax->validate !!}</td>
            <td>{!! $tax->expires !!}</td>
            <td>{!! $tax->status !!}</td>
            <td>{!! $tax->company_id !!}</td>
            <td>
                {!! Form::open(['route' => ['taxes.destroy', $tax->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('taxes.show', [$tax->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('taxes.edit', [$tax->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>