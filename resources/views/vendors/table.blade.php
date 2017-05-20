<table class="table table-responsive" id="vendors-table">
    <thead>
        <th>Vendor Code</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Office Phone</th>
        <th>Mobile Phone</th>
        <th>User Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($vendors as $vendors)
        <tr>
            <td>{!! $vendors->vendor_code !!}</td>
            <td>{!! $vendors->full_name !!}</td>
            <td>{!! $vendors->email !!}</td>
            <td>{!! $vendors->office_phone !!}</td>
            <td>{!! $vendors->mobile_phone !!}</td>
            <td>{!! $vendors->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['vendors.destroy', $vendors->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('vendors.show', [$vendors->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('vendors.edit', [$vendors->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>