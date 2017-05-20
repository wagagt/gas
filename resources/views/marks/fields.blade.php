<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
</div>



<div class="modal-footer">
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::button('<i class="fa fa-floppy-o"></i>', ['type' => 'submit', 'class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Guardar']) !!}
        <a href="{!! route('marks.index') !!}" class="btn btn-primary" data-toggle="tooltip" title="Cancelar"><i class="fa fa-ban"></i></a>
    </div>
</div>
