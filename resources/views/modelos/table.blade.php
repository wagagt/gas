<table class="table table-responsive" id="companies-table">
    <thead>
        <th>Modelos</th>
         <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($modelos as $modelo)
        <tr>
            <td>{!! $modelo->name !!}</td>
            <td>
                {!! Form::open(['route' => ['modelos.destroy', $modelo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('modelos.show', [$modelo->id]) !!}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <button type="button"  data-toggle="modal" data-target="#modeloEditModal{{$modelo->id}}" title="{{$modelo->name}} {{$modelo->id}}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-edit"></i> </button>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('¿Esta seguro de querer borrar el elemento seleccionado?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        <!-- Inicio Modal -->
        @include('modelos.modalEdit')
        <!-- Fin Modal -->
    @endforeach
    </tbody>
</table>