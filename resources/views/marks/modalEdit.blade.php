<div class="modal fade" id="markEditModal{{$mark->id}}" tabindex="-1" role="dialog" aria-labelledby="markModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="markModalLabel">Edición marca</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($mark, ['route' => ['marks.update', $mark->id], 'method' => 'PUT']) !!}
                @include('marks.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>