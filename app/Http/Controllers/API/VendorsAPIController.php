<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVendorsAPIRequest;
use App\Http\Requests\API\UpdateVendorsAPIRequest;
use App\Models\Vendors;
use App\Repositories\VendorsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class VendorsController
 * @package App\Http\Controllers\API
 */

class VendorsAPIController extends AppBaseController
{
    /** @var  VendorsRepository */
    private $vendorsRepository;

    public function __construct(VendorsRepository $vendorsRepo)
    {
        $this->vendorsRepository = $vendorsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/vendors",
     *      summary="Get a listing of the Vendors.",
     *      tags={"Vendors"},
     *      description="Get all Vendors",
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
     *                  @SWG\Items(ref="#/definitions/Vendors")
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
        $this->vendorsRepository->pushCriteria(new RequestCriteria($request));
        $this->vendorsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $vendors = $this->vendorsRepository->all();

        return $this->sendResponse($vendors->toArray(), 'Vendors retrieved successfully');
    }

    /**
     * @param CreateVendorsAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/vendors",
     *      summary="Store a newly created Vendors in storage",
     *      tags={"Vendors"},
     *      description="Store Vendors",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Vendors that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Vendors")
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
     *                  ref="#/definitions/Vendors"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateVendorsAPIRequest $request)
    {
        $input = $request->all();

        $vendors = $this->vendorsRepository->create($input);

        return $this->sendResponse($vendors->toArray(), 'Vendors saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/vendors/{id}",
     *      summary="Display the specified Vendors",
     *      tags={"Vendors"},
     *      description="Get Vendors",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vendors",
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
     *                  ref="#/definitions/Vendors"
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
        /** @var Vendors $vendors */
        $vendors = $this->vendorsRepository->findWithoutFail($id);

        if (empty($vendors)) {
            return $this->sendError('Vendors not found');
        }

        return $this->sendResponse($vendors->toArray(), 'Vendors retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateVendorsAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/vendors/{id}",
     *      summary="Update the specified Vendors in storage",
     *      tags={"Vendors"},
     *      description="Update Vendors",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vendors",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Vendors that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Vendors")
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
     *                  ref="#/definitions/Vendors"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateVendorsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Vendors $vendors */
        $vendors = $this->vendorsRepository->findWithoutFail($id);

        if (empty($vendors)) {
            return $this->sendError('Vendors not found');
        }

        $vendors = $this->vendorsRepository->update($input, $id);

        return $this->sendResponse($vendors->toArray(), 'Vendors updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/vendors/{id}",
     *      summary="Remove the specified Vendors from storage",
     *      tags={"Vendors"},
     *      description="Delete Vendors",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vendors",
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
        /** @var Vendors $vendors */
        $vendors = $this->vendorsRepository->findWithoutFail($id);

        if (empty($vendors)) {
            return $this->sendError('Vendors not found');
        }

        $vendors->delete();

        return $this->sendResponse($id, 'Vendors deleted successfully');
    }
}
