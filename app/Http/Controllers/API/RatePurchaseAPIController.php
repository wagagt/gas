<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRatePurchaseAPIRequest;
use App\Http\Requests\API\UpdateRatePurchaseAPIRequest;
use App\Models\RatePurchase;
use App\Repositories\RatePurchaseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RatePurchaseController
 * @package App\Http\Controllers\API
 */

class RatePurchaseAPIController extends AppBaseController
{
    /** @var  RatePurchaseRepository */
    private $ratePurchaseRepository;

    public function __construct(RatePurchaseRepository $ratePurchaseRepo)
    {
        $this->ratePurchaseRepository = $ratePurchaseRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/ratePurchases",
     *      summary="Get a listing of the RatePurchases.",
     *      tags={"RatePurchase"},
     *      description="Get all RatePurchases",
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
     *                  @SWG\Items(ref="#/definitions/RatePurchase")
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
        $this->ratePurchaseRepository->pushCriteria(new RequestCriteria($request));
        $this->ratePurchaseRepository->pushCriteria(new LimitOffsetCriteria($request));
        $ratePurchases = $this->ratePurchaseRepository->all();

        return $this->sendResponse($ratePurchases->toArray(), 'Rate Purchases retrieved successfully');
    }

    /**
     * @param CreateRatePurchaseAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/ratePurchases",
     *      summary="Store a newly created RatePurchase in storage",
     *      tags={"RatePurchase"},
     *      description="Store RatePurchase",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="RatePurchase that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/RatePurchase")
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
     *                  ref="#/definitions/RatePurchase"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateRatePurchaseAPIRequest $request)
    {
        $input = $request->all();

        $ratePurchases = $this->ratePurchaseRepository->create($input);

        return $this->sendResponse($ratePurchases->toArray(), 'Rate Purchase saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/ratePurchases/{id}",
     *      summary="Display the specified RatePurchase",
     *      tags={"RatePurchase"},
     *      description="Get RatePurchase",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RatePurchase",
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
     *                  ref="#/definitions/RatePurchase"
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
        /** @var RatePurchase $ratePurchase */
        $ratePurchase = $this->ratePurchaseRepository->findWithoutFail($id);

        if (empty($ratePurchase)) {
            return $this->sendError('Rate Purchase not found');
        }

        return $this->sendResponse($ratePurchase->toArray(), 'Rate Purchase retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateRatePurchaseAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/ratePurchases/{id}",
     *      summary="Update the specified RatePurchase in storage",
     *      tags={"RatePurchase"},
     *      description="Update RatePurchase",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RatePurchase",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="RatePurchase that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/RatePurchase")
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
     *                  ref="#/definitions/RatePurchase"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateRatePurchaseAPIRequest $request)
    {
        $input = $request->all();

        /** @var RatePurchase $ratePurchase */
        $ratePurchase = $this->ratePurchaseRepository->findWithoutFail($id);

        if (empty($ratePurchase)) {
            return $this->sendError('Rate Purchase not found');
        }

        $ratePurchase = $this->ratePurchaseRepository->update($input, $id);

        return $this->sendResponse($ratePurchase->toArray(), 'RatePurchase updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/ratePurchases/{id}",
     *      summary="Remove the specified RatePurchase from storage",
     *      tags={"RatePurchase"},
     *      description="Delete RatePurchase",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RatePurchase",
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
        /** @var RatePurchase $ratePurchase */
        $ratePurchase = $this->ratePurchaseRepository->findWithoutFail($id);

        if (empty($ratePurchase)) {
            return $this->sendError('Rate Purchase not found');
        }

        $ratePurchase->delete();

        return $this->sendResponse($id, 'Rate Purchase deleted successfully');
    }
}
