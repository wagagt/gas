@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Insurance Rate
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($insuranceRate, ['route' => ['insuranceRates.update', $insuranceRate->id], 'method' => 'patch']) !!}

                        @include('insurance_rates.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection