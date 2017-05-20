@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tir Rate
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tirRate, ['route' => ['tirRates.update', $tirRate->id], 'method' => 'patch']) !!}

                        @include('tir_rates.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection