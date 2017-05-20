<div class="modal fade" id="typeModal" tabindex="-1" role="dialog" aria-labelledby="typeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="typeModalLabel">Nueva tipo de bien</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'propertyTypes.store', 'method' => 'POST']) !!}
                @include('property_types.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>