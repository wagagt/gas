<table class="table table-responsive" id="users-table">
    <thead>
        <th>Roles</th>
        <th>Descripción</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($roles as $role)
        <tr>
            <td>{!! $role->name !!}</td>
            <td>{!! $role->description !!}</td>

            <td>
                {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('roles.show', [$role->id]) !!}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{{ route('roles.edit',[$role->id]) }}" data-toggle="tootlip" title="{{$role->name}} {{$role->id}}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-edit"></i></a>
                    <!--  Inicio Modal  -->

                   <!-- Fin Modal  -->
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('¿Está usted seguro de eliminar permanentemente el permiso?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
