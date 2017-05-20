@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Rate Purchase
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ratePurchase, ['route' => ['ratePurchases.update', $ratePurchase->id], 'method' => 'patch']) !!}

                        @include('rate_purchases.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection