<div class="modal fade" id="companyModal" tabindex="-1" role="dialog" aria-labelledby="companyModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="companyModalLabel">Nueva empresa</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'companies.store', 'method' => 'POST']) !!}
                @include('companies.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>