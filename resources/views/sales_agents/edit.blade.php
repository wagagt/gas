@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sales Agent
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($salesAgent, ['route' => ['salesAgents.update', $salesAgent->id], 'method' => 'patch']) !!}

                        @include('sales_agents.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection