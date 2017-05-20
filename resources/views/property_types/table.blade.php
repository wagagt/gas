<table class="table table-responsive" id="companies-table">
    <thead>
        <th>Tipo Bien</th>
        <th>Empresa</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($Types as $tipo)
        <tr>
            <td>{!! $tipo->property !!}</td>
            <td>{!! $tipo->company->name !!}</td>
            <td>
                {!! Form::open(['route' => ['propertyTypes.destroy', $tipo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('companies.show', [$tipo->id]) !!}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <button type="button"  data-toggle="modal" data-target="#typeEditModal{{$tipo->id}}" title="{{$tipo->property}} {{$tipo->id}}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-edit"></i></button>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('¿Esta seguro de borrar el tipo de bien?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        <!-- Inicio Modal -->
        @include('property_types.modalEdit')
        <!-- Fin Modal -->

    @endforeach
    </tbody>
</table>