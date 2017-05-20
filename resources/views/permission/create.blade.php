@extends('layouts.app')
@section('title','Permisos')
@section('content')
    <section class="content-header">
        <h1>
            Permisos
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-danger">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'permission.store']) !!}

                        @include('users.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

