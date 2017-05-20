<table class="table table-responsive" id="companies-table">
    <thead>
        <th>Empresa</th>
        <th>Office Phone</th>
        <th>País</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <td>{!! $company->name !!}</td>
            <td>{!! $company->office_phone !!}</td>
            <td>{!! $company->country->name !!}</td>
            <td>
                {!! Form::open(['route' => ['companies.destroy', $company->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('companies.show', [$company->id]) !!}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <button type="button"  data-toggle="modal" data-target="#companyEditModal{{$company->id}}" title="{{$company->name}} {{$company->id}}" class='btn btn-primary btn-md'><i class="glyphicon glyphicon-edit"></i></button>

                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('¿Está seguro de eliminar la empresa?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>

        <!-- Inicio Modal -->
        @include('companies.modalEdit')
        <!-- Fin Modal -->
    @endforeach
    </tbody>
</table>