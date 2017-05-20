<div class="modal fade" id="countryEditModal{{$country->id}}" tabindex="-1" role="dialog" aria-labelledby="countryModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="countryModalLabel">Edición país</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($country, ['route' => ['countries.update', $country->id], 'method' => 'PUT']) !!}
                @include('countries.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>