<table class="table table-responsive" id="salesAgents-table">
    <thead>
        <th>Sales Agent</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Office Phone</th>
        <th>Mobile Phone</th>
        <th>User Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($salesAgents as $salesAgent)
        <tr>
            <td>{!! $salesAgent->sales_agent !!}</td>
            <td>{!! $salesAgent->full_name !!}</td>
            <td>{!! $salesAgent->email !!}</td>
            <td>{!! $salesAgent->office_phone !!}</td>
            <td>{!! $salesAgent->mobile_phone !!}</td>
            <td>{!! $salesAgent->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['salesAgents.destroy', $salesAgent->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('salesAgents.show', [$salesAgent->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('salesAgents.edit', [$salesAgent->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>