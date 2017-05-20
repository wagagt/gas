<table class="table table-responsive" id="companies-table">
    <thead>
        <th>Lineas</th>
         <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($lines as $line)
        <tr>
            <td>{!! $line->name !!}</td>
            <td>
                {!! Form::open(['route' => ['lines.destroy', $line->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('lines.show', [$line->id]) !!}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <button type="button"  data-toggle="modal" data-target="#lineEditModal{{$line->id}}" title="{{$line->name}} {{$line->id}}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-edit"></i> </button>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('¿Esta seguro de querer borrar el elemento seleccionado?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        <!-- Inicio Modal -->
        @include('lines.modalEdit')
        <!-- Fin Modal -->
    @endforeach
    </tbody>
</table>