<li class="treeview">
    <a href="#">
        <i class="fa fa-list-alt"></i>
        <span>Catálogos</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>

    <ul class="treeview-menu">
        <li class="{{ Request::is('countries*') ? 'active' : '' }}">
            <a href="{!! route('countries.index') !!}"><i class="fa fa-edit"></i><span>Países</span></a>
        </li>

        <li class="{{ Request::is('companies*') ? 'active' : '' }}">
            <a href="{!! route('companies.index') !!}"><i class="fa fa-edit"></i><span>Empresas</span></a>
        </li>

        <li class="{{ Request::is('executives*') ? 'active' : '' }}">
            <a href="{!! route('executives.index') !!}"><i class="fa fa-edit"></i><span>Ejecutivos</span></a>
        </li>

        <li class="{{ Request::is('vendors*') ? 'active' : '' }}">
            <a href="{!! route('vendors.index') !!}"><i class="fa fa-edit"></i><span>Vendors</span></a>
        </li>

        <li class="{{ Request::is('salesAgents*') ? 'active' : '' }}">
            <a href="{!! route('salesAgents.index') !!}"><i class="fa fa-edit"></i><span>Agentes</span></a>
        </li>

        <li class="{{ Request::is('taxes*') ? 'active' : '' }}">
            <a href="{!! route('taxes.index') !!}"><i class="fa fa-edit"></i><span>Impuestos</span></a>
        </li>

        <li class="{{ Request::is('rangeValueRates*') ? 'active' : '' }}">
            <a href="{!! route('rangeValueRates.index') !!}"><i class="fa fa-edit"></i><span>Tasa de rango de valor</span></a>
        </li>

        <li class="{{ Request::is('propertyTypes*') ? 'active' : '' }}">
            <a href="{!! route('propertyTypes.index') !!}"><i class="fa fa-edit"></i><span>Tipo de Bienes</span></a>
        </li>

        <li class="{{ Request::is('tirRates*') ? 'active' : '' }}">
            <a href="{!! route('tirRates.index') !!}"><i class="fa fa-edit"></i><span>Tasa TIR</span></a>
        </li>

        <li class="{{ Request::is('initialExpenses*') ? 'active' : '' }}">
            <a href="{!! route('initialExpenses.index') !!}"><i class="fa fa-edit"></i><span>Gastos Iniciales</span></a>
        </li>

        <li class="{{ Request::is('propertyEquipments*') ? 'active' : '' }}">
            <a href="{!! route('propertyEquipments.index') !!}"><i class="fa fa-edit"></i><span>Bienes y Equipos</span></a>
        </li>

        <li class="{{ Request::is('insuranceRates*') ? 'active' : '' }}">
            <a href="{!! route('insuranceRates.index') !!}"><i class="fa fa-edit"></i><span>Tasa de seguro</span></a>
        </li>

        <li class="{{ Request::is('ratePurchases*') ? 'active' : '' }}">
            <a href="{!! route('ratePurchases.index') !!}"><i class="fa fa-edit"></i><span>Tasa opcion de compra</span></a>
        </li>
    </ul>

</li>

<li class="{{ Request::is('quotations*') ? 'active' : '' }}">
    <a href="{!! route('quotations.index') !!}"><i class="fa fa-edit"></i><span>Cotización</span></a>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-cogs"></i>
        <span>Administración</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>

    <ul class="treeview-menu">

        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span>Usuarios</span></a>
        </li>

        <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
            <a href="{!! route('permissions.index') !!}"><i class="fa fa-unlock"></i><span>Permisos</span></a>
        </li>
        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{!! route('roles.index') !!}"><i class="fa fa-get-pocket"></i><span>Roles</span></a>
        </li>




    </ul><li class="{{ Request::is('marks*') ? 'active' : '' }}">
    <a href="{!! route('marks.index') !!}"><i class="fa fa-edit"></i><span>Marks</span></a>
</li>

<li class="{{ Request::is('lines*') ? 'active' : '' }}">
    <a href="{!! route('lines.index') !!}"><i class="fa fa-edit"></i><span>Lines</span></a>
</li>


<li class="{{ Request::is('modelos*') ? 'active' : '' }}">
    <a href="{!! route('modelos.index') !!}"><i class="fa fa-edit"></i><span>Modelos</span></a>
</li>

<li class="{{ Request::is('propertyEquipments*') ? 'active' : '' }}">
    <a href="{!! route('propertyEquipments.index') !!}"><i class="fa fa-edit"></i><span>PropertyEquipments</span></a>
</li>

