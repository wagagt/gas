<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePropertyTypeRequest;
use App\Http\Requests\UpdatePropertyTypeRequest;
use App\Models\Country;
use App\Repositories\PropertyTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\PropertyType;
use App\Models\Company;

class PropertyTypeController extends AppBaseController
{
    /** @var  PropertyTypeRepository */
    private $propertyTypeRepository;

    public function __construct(PropertyTypeRepository $propertyTypeRepo)
    {
        $this->propertyTypeRepository = $propertyTypeRepo;
    }


    public function index(Request $request)
    {
        $types = PropertyType::SearchType($request->get('type'))->orderBy('property', 'ASC')->paginate(10);
        $companies = Company::orderBy('name', 'ASC')->pluck('name','id');

        return view('property_types.index')
            ->with('Types', $types)
            ->with('companies', $companies);
    }

    /**
     * Show the form for creating a new PropertyType.
     *
     * @return Response
     */
    public function create()
    {
        return view('property_types.create');
    }

    /**
     * Store a newly created PropertyType in storage.
     *
     * @param CreatePropertyTypeRequest $request
     *
     * @return Response
     */
    public function store(CreatePropertyTypeRequest $request)
    {
        $input = $request->all();

        $propertyType = $this->propertyTypeRepository->create($input);

        Flash::success('Tipo de bien creado exitosamente.');

        return redirect(route('propertyTypes.index'));
    }

    /**
     * Display the specified PropertyType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $propertyType = $this->propertyTypeRepository->findWithoutFail($id);

        if (empty($propertyType)) {
            Flash::error('Tipo de bien no encontrado');

            return redirect(route('propertyTypes.index'));
        }

        return view('property_types.show')->with('propertyType', $propertyType);
    }

    /**
     * Show the form for editing the specified PropertyType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $propertyType = $this->propertyTypeRepository->findWithoutFail($id);

        if (empty($propertyType)) {
            Flash::error('Tipo de bien no encontrado');

            return redirect(route('propertyTypes.index'));
        }

        return view('property_types.edit')->with('propertyType', $propertyType);
    }

    /**
     * Update the specified PropertyType in storage.
     *
     * @param  int              $id
     * @param UpdatePropertyTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePropertyTypeRequest $request)
    {
        $propertyType = $this->propertyTypeRepository->findWithoutFail($id);

        if (empty($propertyType)) {
            Flash::error('Tipo de bien no encontrado');

            return redirect(route('propertyTypes.index'));
        }

        $propertyType = $this->propertyTypeRepository->update($request->all(), $id);

        Flash::success('Tipo de bien actualizado exitosamente.');

        return redirect(route('propertyTypes.index'));
    }

    /**
     * Remove the specified PropertyType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $propertyType = $this->propertyTypeRepository->findWithoutFail($id);

        if (empty($propertyType)) {
            Flash::error('Tipo de bien no encontrado');

            return redirect(route('propertyTypes.index'));
        }

        $this->propertyTypeRepository->delete($id);

        Flash::success('Tipo de bien eliminado correctamente.');

        return redirect(route('propertyTypes.index'));
    }
}
