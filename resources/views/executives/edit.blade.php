@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Executive
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($executive, ['route' => ['executives.update', $executive->id], 'method' => 'patch']) !!}

                        @include('executives.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection