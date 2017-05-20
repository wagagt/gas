@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Property Equipment
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($propertyEquipment, ['route' => ['propertyEquipments.update', $propertyEquipment->id], 'method' => 'patch']) !!}

                        @include('property_equipments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection