<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePropertyEquipmentRequest;
use App\Http\Requests\UpdatePropertyEquipmentRequest;
use App\Repositories\PropertyEquipmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PropertyEquipmentController extends AppBaseController
{
    /** @var  PropertyEquipmentRepository */
    private $propertyEquipmentRepository;

    public function __construct(PropertyEquipmentRepository $propertyEquipmentRepo)
    {
        $this->propertyEquipmentRepository = $propertyEquipmentRepo;
    }

    /**
     * Display a listing of the PropertyEquipment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->propertyEquipmentRepository->pushCriteria(new RequestCriteria($request));
        $propertyEquipments = $this->propertyEquipmentRepository->all();

        return view('property_equipments.index')
            ->with('propertyEquipments', $propertyEquipments);
    }

    /**
     * Show the form for creating a new PropertyEquipment.
     *
     * @return Response
     */
    public function create()
    {
        return view('property_equipments.create');
    }

    /**
     * Store a newly created PropertyEquipment in storage.
     *
     * @param CreatePropertyEquipmentRequest $request
     *
     * @return Response
     */
    public function store(CreatePropertyEquipmentRequest $request)
    {
        $input = $request->all();

        $propertyEquipment = $this->propertyEquipmentRepository->create($input);

        Flash::success('Property Equipment saved successfully.');

        return redirect(route('propertyEquipments.index'));
    }

    /**
     * Display the specified PropertyEquipment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $propertyEquipment = $this->propertyEquipmentRepository->findWithoutFail($id);

        if (empty($propertyEquipment)) {
            Flash::error('Property Equipment not found');

            return redirect(route('propertyEquipments.index'));
        }

        return view('property_equipments.show')->with('propertyEquipment', $propertyEquipment);
    }

    /**
     * Show the form for editing the specified PropertyEquipment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $propertyEquipment = $this->propertyEquipmentRepository->findWithoutFail($id);

        if (empty($propertyEquipment)) {
            Flash::error('Property Equipment not found');

            return redirect(route('propertyEquipments.index'));
        }

        return view('property_equipments.edit')->with('propertyEquipment', $propertyEquipment);
    }

    /**
     * Update the specified PropertyEquipment in storage.
     *
     * @param  int              $id
     * @param UpdatePropertyEquipmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePropertyEquipmentRequest $request)
    {
        $propertyEquipment = $this->propertyEquipmentRepository->findWithoutFail($id);

        if (empty($propertyEquipment)) {
            Flash::error('Property Equipment not found');

            return redirect(route('propertyEquipments.index'));
        }

        $propertyEquipment = $this->propertyEquipmentRepository->update($request->all(), $id);

        Flash::success('Property Equipment updated successfully.');

        return redirect(route('propertyEquipments.index'));
    }

    /**
     * Remove the specified PropertyEquipment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $propertyEquipment = $this->propertyEquipmentRepository->findWithoutFail($id);

        if (empty($propertyEquipment)) {
            Flash::error('Property Equipment not found');

            return redirect(route('propertyEquipments.index'));
        }

        $this->propertyEquipmentRepository->delete($id);

        Flash::success('Property Equipment deleted successfully.');

        return redirect(route('propertyEquipments.index'));
    }
}
