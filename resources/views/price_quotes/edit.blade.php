@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Price Quote
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($priceQuote, ['route' => ['priceQuotes.update', $priceQuote->id], 'method' => 'patch']) !!}

                        @include('price_quotes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection