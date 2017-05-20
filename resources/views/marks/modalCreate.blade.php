<div class="modal fade" id="markModal" tabindex="-1" role="dialog" aria-labelledby="markModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="markModalLabel">Nueva marca</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'marks.store', 'method' => 'POST']) !!}
                @include('marks.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>