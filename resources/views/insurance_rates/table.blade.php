<table class="table table-responsive" id="insuranceRates-table">
    <thead>
        <th>Description</th>
        <th>Weekly Rate</th>
        <th>Monthly Rate</th>
        <th>Quarterly Rate</th>
        <th>Biannual Rate</th>
        <th>Annual Rate</th>
        <th>Property Equipment Id</th>
        <th>Range Value Id</th>
        <th>Company Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($insuranceRates as $insuranceRate)
        <tr>
            <td>{!! $insuranceRate->description !!}</td>
            <td>{!! $insuranceRate->weekly_rate !!}</td>
            <td>{!! $insuranceRate->monthly_rate !!}</td>
            <td>{!! $insuranceRate->quarterly_rate !!}</td>
            <td>{!! $insuranceRate->biannual_rate !!}</td>
            <td>{!! $insuranceRate->annual_rate !!}</td>
            <td>{!! $insuranceRate->property_equipment_id !!}</td>
            <td>{!! $insuranceRate->range_value_id !!}</td>
            <td>{!! $insuranceRate->company_id !!}</td>
            <td>
                {!! Form::open(['route' => ['insuranceRates.destroy', $insuranceRate->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('insuranceRates.show', [$insuranceRate->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('insuranceRates.edit', [$insuranceRate->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>