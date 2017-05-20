<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInsuranceRateAPIRequest;
use App\Http\Requests\API\UpdateInsuranceRateAPIRequest;
use App\Models\InsuranceRate;
use App\Repositories\InsuranceRateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InsuranceRateController
 * @package App\Http\Controllers\API
 */

class InsuranceRateAPIController extends AppBaseController
{
    /** @var  InsuranceRateRepository */
    private $insuranceRateRepository;

    public function __construct(InsuranceRateRepository $insuranceRateRepo)
    {
        $this->insuranceRateRepository = $insuranceRateRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/insuranceRates",
     *      summary="Get a listing of the InsuranceRates.",
     *      tags={"InsuranceRate"},
     *      description="Get all InsuranceRates",
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
     *                  @SWG\Items(ref="#/definitions/InsuranceRate")
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
        $this->insuranceRateRepository->pushCriteria(new RequestCriteria($request));
        $this->insuranceRateRepository->pushCriteria(new LimitOffsetCriteria($request));
        $insuranceRates = $this->insuranceRateRepository->all();

        return $this->sendResponse($insuranceRates->toArray(), 'Insurance Rates retrieved successfully');
    }

    /**
     * @param CreateInsuranceRateAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/insuranceRates",
     *      summary="Store a newly created InsuranceRate in storage",
     *      tags={"InsuranceRate"},
     *      description="Store InsuranceRate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InsuranceRate that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InsuranceRate")
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
     *                  ref="#/definitions/InsuranceRate"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInsuranceRateAPIRequest $request)
    {
        $input = $request->all();

        $insuranceRates = $this->insuranceRateRepository->create($input);

        return $this->sendResponse($insuranceRates->toArray(), 'Insurance Rate saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/insuranceRates/{id}",
     *      summary="Display the specified InsuranceRate",
     *      tags={"InsuranceRate"},
     *      description="Get InsuranceRate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InsuranceRate",
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
     *                  ref="#/definitions/InsuranceRate"
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
        /** @var InsuranceRate $insuranceRate */
        $insuranceRate = $this->insuranceRateRepository->findWithoutFail($id);

        if (empty($insuranceRate)) {
            return $this->sendError('Insurance Rate not found');
        }

        return $this->sendResponse($insuranceRate->toArray(), 'Insurance Rate retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateInsuranceRateAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/insuranceRates/{id}",
     *      summary="Update the specified InsuranceRate in storage",
     *      tags={"InsuranceRate"},
     *      description="Update InsuranceRate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InsuranceRate",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InsuranceRate that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InsuranceRate")
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
     *                  ref="#/definitions/InsuranceRate"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInsuranceRateAPIRequest $request)
    {
        $input = $request->all();

        /** @var InsuranceRate $insuranceRate */
        $insuranceRate = $this->insuranceRateRepository->findWithoutFail($id);

        if (empty($insuranceRate)) {
            return $this->sendError('Insurance Rate not found');
        }

        $insuranceRate = $this->insuranceRateRepository->update($input, $id);

        return $this->sendResponse($insuranceRate->toArray(), 'InsuranceRate updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/insuranceRates/{id}",
     *      summary="Remove the specified InsuranceRate from storage",
     *      tags={"InsuranceRate"},
     *      description="Delete InsuranceRate",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InsuranceRate",
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
        /** @var InsuranceRate $insuranceRate */
        $insuranceRate = $this->insuranceRateRepository->findWithoutFail($id);

        if (empty($insuranceRate)) {
            return $this->sendError('Insurance Rate not found');
        }

        $insuranceRate->delete();

        return $this->sendResponse($id, 'Insurance Rate deleted successfully');
    }
}
