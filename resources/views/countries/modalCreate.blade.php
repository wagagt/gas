<div class="modal fade" id="countryModal" tabindex="-1" role="dialog" aria-labelledby="countrModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="countrModalLabel">Nuevo país</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'countries.store', 'method' => 'POST']) !!}
                @include('countries.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>