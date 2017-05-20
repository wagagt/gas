<div class="modal fade" id="permossionEditModal{{$permiso->id}}" tabindex="-1" role="dialog" aria-labelledby="permisoModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="permisoModalLabel">Edición Permiso</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($permiso, ['route' => ['permissions.update', $permiso->id], 'method' => 'PUT']) !!}
                @include('permission.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>