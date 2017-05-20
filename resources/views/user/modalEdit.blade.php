<div class="modal fade" id="usuarioEditModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="usuarioModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="usuarioModalLabel">Edición usuario</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
                @include('user.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>