<div class="modal fade" id="rolEditModal{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="permisoModalLabel">Edición Rol</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}
                @include('role.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>