<div class="modal fade" id="lineEditModal{{$line->id}}" tabindex="-1" role="dialog" aria-labelledby="lineModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="lineModalLabel">Edición linea</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($line, ['route' => ['lines.update', $line->id], 'method' => 'PUT']) !!}
                @include('lines.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>