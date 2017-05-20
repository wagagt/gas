<div class="modal fade" id="companyEditModal{{$company->id}}" tabindex="-1" role="dialog" aria-labelledby="companyModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="companyModalLabel">Edición Empresa</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($company, ['route' => ['countries.update', $company->id], 'method' => 'PUT']) !!}
                @include('companies.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>