@extends('layouts.app')
@section('title', 'Inicio')

@section('content')
<div class="container-fluid">
    <div  style="margin-top: 15px">
        
          <!-- Menú Principal decide what user can see -->
        @role('admin | super')
          <div class="col-md-3 text-center">
               <div class="box box-danger" >
                   <div class="header" style="magin-top:5px">
                       <b>Configuraciones / mantenimientos</b>
                   </div>
                   <div class="body">
                       <a href="{!! route('configMenu') !!}" data-toggle="tooltip" title="Configuraciones" class="btn btn-app" >
                           <i class="fa fa-cog"></i>


                       </a>
                   </div>

               </div>
           </div>
           <div class="col-md-3 text-center">
               <div class="box box-danger" >
                   <div class="header" style="magin-top:5px">
                       <b>Menu de Reportes</b>
                   </div>
                   <div class="body">
                       <a href="#" class="btn btn-app" data-toggle="tooltip" title="Menu de Reportes" >
                           <i class="fa fa-calculator">

                           </i>
                       </a>
                   </div>

               </div>
           </div>
          
          <div class="col-md-3 text-center">
               <div class="box box-danger" >
                   <div class="header" style="magin-top:5px">
                       <b>Vendors</b>
                   </div>
                   <div class="body">
                       <a href="#" class="btn btn-app" data-toggle="tooltip" title="Mantenimiento de Vendors">
                           <i class="fa fa-building">

                           </i>
                       </a>
                   </div>

               </div>
           </div>


           
         <div class="col-md-3 text-center">
               <div class="box box-danger" >
                   <div class="header" style="magin-top:5px">
                     <b>Monitoreo de Actividad</b>
                   </div>
                   <div class="body">
                       <a href="#" class="btn btn-app" data-toggle="tooltip" title="Monitoreo de Actividad">
                           <i class="fa fa-bar-chart-o">

                           </i>
                       </a>
                   </div>

               </div>
           </div>
           <div class="col-md-3 text-center">
               <div class="box box-danger" >
                   <div class="header" style="magin-top:5px">
                      <b>Estadísticas</b>
                   </div>
                   <div class="body">
                       <a href="#" class="btn btn-app" data-toggle="tooltip" title="Estadísticas">
                           <i class="fa fa-pie-chart"></i>
                       </a>
                   </div>

               </div>
           </div>

          @endrole
        @role('editor')
        <div class="col-md-3 text-center">
            <div class="box box-danger" >
                <div class="header" style="magin-top:5px">
                    <b>Leasing Financiero</b>
                </div>
                <div class="body">
                    <a href="#" class="btn btn-app" data-toggle="tooltip" title="Leasing Financiero">
                        <i class="fa fa-briefcase"></i>
                    </a>
                </div>

            </div>
        </div>


        @endrole

        
    </div>
</div>
@endsection
