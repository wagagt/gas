<div class="modal fade" id="modeloEditModal{{$modelo->id}}" tabindex="-1" role="dialog" aria-labelledby="modeloModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modeloModalLabel">Edición modelo</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($modelo, ['route' => ['lines.update', $modelo->id], 'method' => 'PUT']) !!}
                @include('modelos.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>