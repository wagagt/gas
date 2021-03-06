<table class="table table-responsive" id="executives-table">
    <thead>
        <th>Executive Code</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Office Phone</th>
        <th>Mobile Phone</th>
        <th>User Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($executives as $executive)
        <tr>
            <td>{!! $executive->executive_code !!}</td>
            <td>{!! $executive->full_name !!}</td>
            <td>{!! $executive->email !!}</td>
            <td>{!! $executive->office_phone !!}</td>
            <td>{!! $executive->mobile_phone !!}</td>
            <td>{!! $executive->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['executives.destroy', $executive->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('executives.show', [$executive->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('executives.edit', [$executive->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>