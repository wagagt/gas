<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTaxAPIRequest;
use App\Http\Requests\API\UpdateTaxAPIRequest;
use App\Models\Tax;
use App\Repositories\TaxRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TaxController
 * @package App\Http\Controllers\API
 */

class TaxAPIController extends AppBaseController
{
    /** @var  TaxRepository */
    private $taxRepository;

    public function __construct(TaxRepository $taxRepo)
    {
        $this->taxRepository = $taxRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/taxes",
     *      summary="Get a listing of the Taxes.",
     *      tags={"Tax"},
     *      description="Get all Taxes",
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
     *                  @SWG\Items(ref="#/definitions/Tax")
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
        $this->taxRepository->pushCriteria(new RequestCriteria($request));
        $this->taxRepository->pushCriteria(new LimitOffsetCriteria($request));
        $taxes = $this->taxRepository->all();

        return $this->sendResponse($taxes->toArray(), 'Taxes retrieved successfully');
    }

    /**
     * @param CreateTaxAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/taxes",
     *      summary="Store a newly created Tax in storage",
     *      tags={"Tax"},
     *      description="Store Tax",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Tax that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Tax")
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
     *                  ref="#/definitions/Tax"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTaxAPIRequest $request)
    {
        $input = $request->all();

        $taxes = $this->taxRepository->create($input);

        return $this->sendResponse($taxes->toArray(), 'Tax saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/taxes/{id}",
     *      summary="Display the specified Tax",
     *      tags={"Tax"},
     *      description="Get Tax",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Tax",
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
     *                  ref="#/definitions/Tax"
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
        /** @var Tax $tax */
        $tax = $this->taxRepository->findWithoutFail($id);

        if (empty($tax)) {
            return $this->sendError('Tax not found');
        }

        return $this->sendResponse($tax->toArray(), 'Tax retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTaxAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/taxes/{id}",
     *      summary="Update the specified Tax in storage",
     *      tags={"Tax"},
     *      description="Update Tax",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Tax",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Tax that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Tax")
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
     *                  ref="#/definitions/Tax"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTaxAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tax $tax */
        $tax = $this->taxRepository->findWithoutFail($id);

        if (empty($tax)) {
            return $this->sendError('Tax not found');
        }

        $tax = $this->taxRepository->update($input, $id);

        return $this->sendResponse($tax->toArray(), 'Tax updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/taxes/{id}",
     *      summary="Remove the specified Tax from storage",
     *      tags={"Tax"},
     *      description="Delete Tax",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Tax",
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
        /** @var Tax $tax */
        $tax = $this->taxRepository->findWithoutFail($id);

        if (empty($tax)) {
            return $this->sendError('Tax not found');
        }

        $tax->delete();

        return $this->sendResponse($id, 'Tax deleted successfully');
    }
}
