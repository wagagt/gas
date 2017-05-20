<table class="table table-responsive" id="users-table">
    <thead>
        <th>Nombre completo</th>
        <th>Usuario</th>
        <th>Correo</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->full_name !!}</td>
            <td>{!! $user->user_name !!}</td>
            <td>{!! $user->email !!}</td>

            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('users.edit', [$user->id]) !!}" data-target="tooltip" title="{{$user->user_name}} {{$user->id}}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-edit"></i></a>
                    <!--  Inicio Modal  -->
                    
                   <!-- Fin Modal  -->
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('¿Está usted seguro de eliminar al usuario seleccionado?')"]) !!}
                </div>
                {!! Form::close() !!}

            
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
