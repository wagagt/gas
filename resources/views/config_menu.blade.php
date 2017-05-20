@extends('layouts.app')
@section('title', 'Mantenimientos')

@section('content')
<div class="container-fluid">
	<div style="margin-top:15px">
		@role('admin')

		<div class="col-md-12"  style="margin-bottom:50px">
			<a href="{{ route('homeIndex') }}" class="btn btn-primary pull-left" data-toggle="tooltip" title="Regresar al menu principal"><i class="fa fa-arrow-circle-left fa-4"></i></a>

		</div>

        <div class="col-md-12">
            <h3 class="pull-left"> Mantenimientos</h3>
        </div>

        <div class="col-md-3 text-center">
            <div class="box box-danger" >
                <div class="header" style="magin-top:5px">
                    <b>Mantenimiento de Usuarios</b>
                </div>
                <div class="body">
                    <a href="{!! route('users.index') !!}" class="btn btn-app" data-toggle="tooltip" title="Mantenimiento de Usuarios">
                        <i class="fa fa-users">

                        </i>
                    </a>
                </div>

            </div>
        </div>

		<div class="col-md-3 text-center">
               <div class="box box-danger" >
                   <div class="header" style="magin-top:5px">
                       <b>Países</b>
                   </div>
                   <div class="body">
                       <a href="{!! route('countries.index') !!}" class="btn btn-app" >
                           <i class="fa fa-flag"></i>

                       </a>
                   </div>

               </div>
           </div>

           <div class="col-md-3 text-center">
               <div class="box box-danger" >
                   <div class="header" style="magin-top:5px">
                       <b>Empresas</b>
                   </div>
                   <div class="body">
                       <a href="{!! route('companies.index') !!}" class="btn btn-app" >
                           <i class="fa fa-building"></i>

                       </a>
                   </div>

               </div>
           </div>

        <div class="col-md-3 text-center">
            <div class="box box-danger" >
                <div class="header" style="magin-top:5px">
                    <b>Tipo de bienes</b>
                </div>
                <div class="body">
                    <a href="{{ route('propertyTypes.index') }}" class="btn btn-app" >
                        <i class="fa fa-barcode"></i>

                    </a>
                </div>

            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="box box-danger" >
                <div class="header" style="magin-top:5px">
                    <b>Marcas de bienes</b>
                </div>
                <div class="body">
                    <a href="{{route('marks.index')}}" class="btn btn-app" >
                        <i class="fa fa-copyright"></i>

                    </a>
                </div>

            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="box box-danger" >
                <div class="header" style="magin-top:5px">
                    <b>Linea de bienes</b>
                </div>
                <div class="body">
                    <a href="{{route('lines.index')}}" class="btn btn-app" >
                        <i class="fa fa-cc"></i>

                    </a>
                </div>

            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="box box-danger" >
                <div class="header" style="magin-top:5px">
                    <b>Modelos de bienes</b>
                </div>
                <div class="body">
                    <a href="{{route('modelos.index')}}" class="btn btn-app" >
                        <i class="fa fa-newspaper-o"></i>

                    </a>
                </div>

            </div>
        </div>

        <div class="col-md-3 text-center">
            <div class="box box-danger" >
                <div class="header" style="magin-top:5px">
                    <b>Mantenimiento de bienes</b>
                </div>
                <div class="body">
                    <a href="#" class="btn btn-app" data-toggle="tooltip" title="Mantenimiento de bienes">
                        <i class="fa fa-car">

                        </i>
                    </a>
                </div>

            </div>
        </div>





        @endrole
	</div>
</div>

@endsection