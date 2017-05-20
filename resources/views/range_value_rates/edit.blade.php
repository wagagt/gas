@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Range Value Rate
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($rangeValueRate, ['route' => ['rangeValueRates.update', $rangeValueRate->id], 'method' => 'patch']) !!}

                        @include('range_value_rates.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection