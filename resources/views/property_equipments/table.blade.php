<table class="table table-responsive" id="propertyEquipments-table">
    <thead>
        <th>Name</th>
        <th>Properties</th>
        <th>Modelo Id</th>
        <th>Mark Id</th>
        <th>Line Id</th>
        <th>Color</th>
        <th>Uploads</th>
        <th>Property Type Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($propertyEquipments as $propertyEquipment)
        <tr>
            <td>{!! $propertyEquipment->name !!}</td>
            <td>{!! $propertyEquipment->properties !!}</td>
            <td>{!! $propertyEquipment->modelo_id !!}</td>
            <td>{!! $propertyEquipment->mark_id !!}</td>
            <td>{!! $propertyEquipment->line_id !!}</td>
            <td>{!! $propertyEquipment->color !!}</td>
            <td>{!! $propertyEquipment->uploads !!}</td>
            <td>{!! $propertyEquipment->property_type_id !!}</td>
            <td>
                {!! Form::open(['route' => ['propertyEquipments.destroy', $propertyEquipment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('propertyEquipments.show', [$propertyEquipment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('propertyEquipments.edit', [$propertyEquipment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>