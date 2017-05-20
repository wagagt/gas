<table class="table table-responsive table-hover" id="countries-table">
    <thead>
        <th>Nombre</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($countries as $country)
        <tr>
            <td>{!! $country->name !!}</td>
            <td>
                {!! Form::open(['route' => ['countries.destroy', $country->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('countries.show', [$country->id]) !!}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <button type="button" data-toggle="modal" data-target="#countryEditModal{{$country->id}}" title="{{$country->name}} {{$country->id}}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-edit"></i></button>

                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('¿Está seguro de eliminar el país?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        <!-- Inicio Modal -->
        @include('countries.modalEdit')
        <!-- Fin Modal -->
    @endforeach
    </tbody>
</table>