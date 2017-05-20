<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRangeValueRateAPIRequest;
use App\Http\Requests\API\UpdateRangeValueRateAPIRequest;
use App\Models\RangeValueRate;
use App\Repositories\RangeValueRateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RangeValueRateController
 * @package App\Http\Controllers\API
 */

class RangeValueRateAPIController extends AppBaseController
{
    /** @var  RangeValueRateRepository */
    private $rangeValueRateRepository;

    public function __construct(RangeValueRateRepository $rangeValueRateRepo)
    {
        $this->rangeValueRateRepository = $rangeValueRateRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/rangeValueRates",
     *      summary="Get a listing of the RangeValueRates.",
     *      tags={"RangeValueRate"},
     *      description="Get all RangeValueRates",
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
     *                  @SWG\Items(ref="#/definitions/RangeValueRate")
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
        $this->rangeValueRateRepository->pushCriteria(new RequestCriteria($request));
        $this->rangeValueRateRepository->pushCriteria(new LimitOffsetCriteria($request));
        $rangeValueRates = $this->rangeValueRateRepository->all();

        return $this->sendResponse($rangeValueRates->toArray(), 'Range Value Rates retrieved successfully');
    }

    /**
     * @param CreateRangeValueRateAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/rangeValueRates",
     *      summary="Store a newly created RangeValueRate in storage",
     *      tags={"RangeValueRate"},
     *      description="Store RangeValueRate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="RangeValueRate that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/RangeValueRate")
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
     *                  ref="#/definitions/RangeValueRate"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateRangeValueRateAPIRequest $request)
    {
        $input = $request->all();

        $rangeValueRates = $this->rangeValueRateRepository->create($input);

        return $this->sendResponse($rangeValueRates->toArray(), 'Range Value Rate saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/rangeValueRates/{id}",
     *      summary="Display the specified RangeValueRate",
     *      tags={"RangeValueRate"},
     *      description="Get RangeValueRate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RangeValueRate",
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
     *                  ref="#/definitions/RangeValueRate"
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
        /** @var RangeValueRate $rangeValueRate */
        $rangeValueRate = $this->rangeValueRateRepository->findWithoutFail($id);

        if (empty($rangeValueRate)) {
            return $this->sendError('Range Value Rate not found');
        }

        return $this->sendResponse($rangeValueRate->toArray(), 'Range Value Rate retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateRangeValueRateAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/rangeValueRates/{id}",
     *      summary="Update the specified RangeValueRate in storage",
     *      tags={"RangeValueRate"},
     *      description="Update RangeValueRate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RangeValueRate",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="RangeValueRate that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/RangeValueRate")
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
     *                  ref="#/definitions/RangeValueRate"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateRangeValueRateAPIRequest $request)
    {
        $input = $request->all();

        /** @var RangeValueRate $rangeValueRate */
        $rangeValueRate = $this->rangeValueRateRepository->findWithoutFail($id);

        if (empty($rangeValueRate)) {
            return $this->sendError('Range Value Rate not found');
        }

        $rangeValueRate = $this->rangeValueRateRepository->update($input, $id);

        return $this->sendResponse($rangeValueRate->toArray(), 'RangeValueRate updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/rangeValueRates/{id}",
     *      summary="Remove the specified RangeValueRate from storage",
     *      tags={"RangeValueRate"},
     *      description="Delete RangeValueRate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RangeValueRate",
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
        /** @var RangeValueRate $rangeValueRate */
        $rangeValueRate = $this->rangeValueRateRepository->findWithoutFail($id);

        if (empty($rangeValueRate)) {
            return $this->sendError('Range Value Rate not found');
        }

        $rangeValueRate->delete();

        return $this->sendResponse($id, 'Range Value Rate deleted successfully');
    }
}
