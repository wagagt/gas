
<div class="form-group col-md-3">
    {!! Form::label('user_name', 'Usuario:') !!}
    <p>{!! $user->user_name !!}</p>
</div>

<div class="form-group col-md-3">
    {!! Form::label('first_name', 'Nombres:') !!}
    <p>{!! $user->first_name !!}</p>
</div>


<div class="form-group col-md-3">
    {!! Form::label('last_name', 'Apellidos:') !!}
    <p>{!! $user->last_name  !!}</p>
</div>


<div class="form-group col-md-3">
    {!! Form::label('married_surname', 'Apellido de casada:') !!}
    <p>{!! $user->married_surname !!}</p>
</div>


<div class="form-group col-md-6">
    {!! Form::label('email', 'Correo electrónico:') !!}
    <p>{!! $user->email !!}</p>
</div>

<div class="form-group col-md-6">
    {!! Form::label('email', 'Nombre completo:') !!}
    <p>{!! $user->full_name !!}</p>
</div>

<div class="form-group col-md-12">
	{!! Form::label('roles[]', 'Roles') !!}
	{!! Form::select('roles[]', $roles, $getRoles,['class' => 'form-control select-role','multiple', 'disabled', 'style'=>'width:100%']) !!}
</div>
