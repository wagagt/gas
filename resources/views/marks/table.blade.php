<table class="table table-responsive" id="companies-table">
    <thead>
        <th>Marcas</th>
         <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($marks as $mark)
        <tr>
            <td>{!! $mark->name !!}</td>
            <td>
                {!! Form::open(['route' => ['marks.destroy', $mark->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('marks.show', [$mark->id]) !!}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <button type="button"  data-toggle="modal" data-target="#markEditModal{{$mark->id}}" title="{{$mark->name}} {{$mark->id}}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-edit"></i> </button>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('¿Esta seguro de querer borrar el elemento seleccionado?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        <!-- Inicio Modal -->
        @include('marks.modalEdit')
        <!-- Fin Modal -->
    @endforeach
    </tbody>
</table>