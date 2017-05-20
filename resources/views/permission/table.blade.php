<table class="table table-responsive" id="users-table">
    <thead>
        <th>Permiso</th>
        <th>Descripción</th>
        
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($permissions as $permiso)
        <tr>
            <td>{!! $permiso->name !!}</td>
            <td>{!! $permiso->description !!}</td>
            
            <td>
                {!! Form::open(['route' => ['permissions.destroy', $permiso->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('permissions.show', [$permiso->id]) !!}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <button type="button"  data-toggle="modal" data-target="#permossionEditModal{{$permiso->id}}" title="{{$permiso->name}} {{$permiso->id}}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-edit"></i></button>

                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('¿Está usted seguro de eliminar permanentemente el permiso?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        <!--  Inicio Modal  -->
        @include('permission.modalEdit')
        <!-- Fin Modal  -->
    @endforeach
    </tbody>
</table>
