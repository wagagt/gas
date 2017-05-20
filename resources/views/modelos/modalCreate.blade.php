<div class="modal fade" id="modeloModal" tabindex="-1" role="dialog" aria-labelledby="modeloModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modeloModalLabel">Nueva modelo</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'modelos.store', 'method' => 'POST']) !!}
                @include('modelos.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>