<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePropertyEquipmentAPIRequest;
use App\Http\Requests\API\UpdatePropertyEquipmentAPIRequest;
use App\Models\PropertyEquipment;
use App\Repositories\PropertyEquipmentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PropertyEquipmentController
 * @package App\Http\Controllers\API
 */

class PropertyEquipmentAPIController extends AppBaseController
{
    /** @var  PropertyEquipmentRepository */
    private $propertyEquipmentRepository;

    public function __construct(PropertyEquipmentRepository $propertyEquipmentRepo)
    {
        $this->propertyEquipmentRepository = $propertyEquipmentRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/propertyEquipments",
     *      summary="Get a listing of the PropertyEquipments.",
     *      tags={"PropertyEquipment"},
     *      description="Get all PropertyEquipments",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/PropertyEquipment")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->propertyEquipmentRepository->pushCriteria(new RequestCriteria($request));
        $this->propertyEquipmentRepository->pushCriteria(new LimitOffsetCriteria($request));
        $propertyEquipments = $this->propertyEquipmentRepository->all();

        return $this->sendResponse($propertyEquipments->toArray(), 'Property Equipments retrieved successfully');
    }

    /**
     * @param CreatePropertyEquipmentAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/propertyEquipments",
     *      summary="Store a newly created PropertyEquipment in storage",
     *      tags={"PropertyEquipment"},
     *      description="Store PropertyEquipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PropertyEquipment that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PropertyEquipment")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/PropertyEquipment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePropertyEquipmentAPIRequest $request)
    {
        $input = $request->all();

        $propertyEquipments = $this->propertyEquipmentRepository->create($input);

        return $this->sendResponse($propertyEquipments->toArray(), 'Property Equipment saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/propertyEquipments/{id}",
     *      summary="Display the specified PropertyEquipment",
     *      tags={"PropertyEquipment"},
     *      description="Get PropertyEquipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PropertyEquipment",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/PropertyEquipment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var PropertyEquipment $propertyEquipment */
        $propertyEquipment = $this->propertyEquipmentRepository->findWithoutFail($id);

        if (empty($propertyEquipment)) {
            return $this->sendError('Property Equipment not found');
        }

        return $this->sendResponse($propertyEquipment->toArray(), 'Property Equipment retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePropertyEquipmentAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/propertyEquipments/{id}",
     *      summary="Update the specified PropertyEquipment in storage",
     *      tags={"PropertyEquipment"},
     *      description="Update PropertyEquipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PropertyEquipment",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PropertyEquipment that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PropertyEquipment")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/PropertyEquipment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePropertyEquipmentAPIRequest $request)
    {
        $input = $request->all();

        /** @var PropertyEquipment $propertyEquipment */
        $propertyEquipment = $this->propertyEquipmentRepository->findWithoutFail($id);

        if (empty($propertyEquipment)) {
            return $this->sendError('Property Equipment not found');
        }

        $propertyEquipment = $this->propertyEquipmentRepository->update($input, $id);

        return $this->sendResponse($propertyEquipment->toArray(), 'PropertyEquipment updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/propertyEquipments/{id}",
     *      summary="Remove the specified PropertyEquipment from storage",
     *      tags={"PropertyEquipment"},
     *      description="Delete PropertyEquipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PropertyEquipment",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var PropertyEquipment $propertyEquipment */
        $propertyEquipment = $this->propertyEquipmentRepository->findWithoutFail($id);

        if (empty($propertyEquipment)) {
            return $this->sendError('Property Equipment not found');
        }

        $propertyEquipment->delete();

        return $this->sendResponse($id, 'Property Equipment deleted successfully');
    }
}
