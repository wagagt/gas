<div class="modal fade" id="rolesModal" tabindex="-1" role="dialog" aria-labelledby="rolesModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="rolesModalLabel">Nuevo role</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
                @include('role.fields')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

