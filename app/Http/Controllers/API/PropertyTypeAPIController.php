<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePropertyTypeAPIRequest;
use App\Http\Requests\API\UpdatePropertyTypeAPIRequest;
use App\Models\PropertyType;
use App\Repositories\PropertyTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PropertyTypeController
 * @package App\Http\Controllers\API
 */

class PropertyTypeAPIController extends AppBaseController
{
    /** @var  PropertyTypeRepository */
    private $propertyTypeRepository;

    public function __construct(PropertyTypeRepository $propertyTypeRepo)
    {
        $this->propertyTypeRepository = $propertyTypeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/propertyTypes",
     *      summary="Get a listing of the PropertyTypes.",
     *      tags={"PropertyType"},
     *      description="Get all PropertyTypes",
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
     *                  @SWG\Items(ref="#/definitions/PropertyType")
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
        $this->propertyTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->propertyTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $propertyTypes = $this->propertyTypeRepository->all();

        return $this->sendResponse($propertyTypes->toArray(), 'Property Types retrieved successfully');
    }

    /**
     * @param CreatePropertyTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/propertyTypes",
     *      summary="Store a newly created PropertyType in storage",
     *      tags={"PropertyType"},
     *      description="Store PropertyType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PropertyType that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PropertyType")
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
     *                  ref="#/definitions/PropertyType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePropertyTypeAPIRequest $request)
    {
        $input = $request->all();

        $propertyTypes = $this->propertyTypeRepository->create($input);

        return $this->sendResponse($propertyTypes->toArray(), 'Property Type saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/propertyTypes/{id}",
     *      summary="Display the specified PropertyType",
     *      tags={"PropertyType"},
     *      description="Get PropertyType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PropertyType",
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
     *                  ref="#/definitions/PropertyType"
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
        /** @var PropertyType $propertyType */
        $propertyType = $this->propertyTypeRepository->findWithoutFail($id);

        if (empty($propertyType)) {
            return $this->sendError('Property Type not found');
        }

        return $this->sendResponse($propertyType->toArray(), 'Property Type retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePropertyTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/propertyTypes/{id}",
     *      summary="Update the specified PropertyType in storage",
     *      tags={"PropertyType"},
     *      description="Update PropertyType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PropertyType",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PropertyType that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PropertyType")
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
     *                  ref="#/definitions/PropertyType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePropertyTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var PropertyType $propertyType */
        $propertyType = $this->propertyTypeRepository->findWithoutFail($id);

        if (empty($propertyType)) {
            return $this->sendError('Property Type not found');
        }

        $propertyType = $this->propertyTypeRepository->update($input, $id);

        return $this->sendResponse($propertyType->toArray(), 'PropertyType updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/propertyTypes/{id}",
     *      summary="Remove the specified PropertyType from storage",
     *      tags={"PropertyType"},
     *      description="Delete PropertyType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PropertyType",
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
        /** @var PropertyType $propertyType */
        $propertyType = $this->propertyTypeRepository->findWithoutFail($id);

        if (empty($propertyType)) {
            return $this->sendError('Property Type not found');
        }

        $propertyType->delete();

        return $this->sendResponse($id, 'Property Type deleted successfully');
    }
}
