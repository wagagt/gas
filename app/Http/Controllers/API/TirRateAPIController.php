<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTirRateAPIRequest;
use App\Http\Requests\API\UpdateTirRateAPIRequest;
use App\Models\TirRate;
use App\Repositories\TirRateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TirRateController
 * @package App\Http\Controllers\API
 */

class TirRateAPIController extends AppBaseController
{
    /** @var  TirRateRepository */
    private $tirRateRepository;

    public function __construct(TirRateRepository $tirRateRepo)
    {
        $this->tirRateRepository = $tirRateRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tirRates",
     *      summary="Get a listing of the TirRates.",
     *      tags={"TirRate"},
     *      description="Get all TirRates",
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
     *                  @SWG\Items(ref="#/definitions/TirRate")
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
        $this->tirRateRepository->pushCriteria(new RequestCriteria($request));
        $this->tirRateRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tirRates = $this->tirRateRepository->all();

        return $this->sendResponse($tirRates->toArray(), 'Tir Rates retrieved successfully');
    }

    /**
     * @param CreateTirRateAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tirRates",
     *      summary="Store a newly created TirRate in storage",
     *      tags={"TirRate"},
     *      description="Store TirRate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TirRate that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TirRate")
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
     *                  ref="#/definitions/TirRate"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTirRateAPIRequest $request)
    {
        $input = $request->all();

        $tirRates = $this->tirRateRepository->create($input);

        return $this->sendResponse($tirRates->toArray(), 'Tir Rate saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tirRates/{id}",
     *      summary="Display the specified TirRate",
     *      tags={"TirRate"},
     *      description="Get TirRate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TirRate",
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
     *                  ref="#/definitions/TirRate"
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
        /** @var TirRate $tirRate */
        $tirRate = $this->tirRateRepository->findWithoutFail($id);

        if (empty($tirRate)) {
            return $this->sendError('Tir Rate not found');
        }

        return $this->sendResponse($tirRate->toArray(), 'Tir Rate retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTirRateAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tirRates/{id}",
     *      summary="Update the specified TirRate in storage",
     *      tags={"TirRate"},
     *      description="Update TirRate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TirRate",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TirRate that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TirRate")
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
     *                  ref="#/definitions/TirRate"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTirRateAPIRequest $request)
    {
        $input = $request->all();

        /** @var TirRate $tirRate */
        $tirRate = $this->tirRateRepository->findWithoutFail($id);

        if (empty($tirRate)) {
            return $this->sendError('Tir Rate not found');
        }

        $tirRate = $this->tirRateRepository->update($input, $id);

        return $this->sendResponse($tirRate->toArray(), 'TirRate updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tirRates/{id}",
     *      summary="Remove the specified TirRate from storage",
     *      tags={"TirRate"},
     *      description="Delete TirRate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TirRate",
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
        /** @var TirRate $tirRate */
        $tirRate = $this->tirRateRepository->findWithoutFail($id);

        if (empty($tirRate)) {
            return $this->sendError('Tir Rate not found');
        }

        $tirRate->delete();

        return $this->sendResponse($id, 'Tir Rate deleted successfully');
    }
}
