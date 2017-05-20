<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInitialExpenseAPIRequest;
use App\Http\Requests\API\UpdateInitialExpenseAPIRequest;
use App\Models\InitialExpense;
use App\Repositories\InitialExpenseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InitialExpenseController
 * @package App\Http\Controllers\API
 */

class InitialExpenseAPIController extends AppBaseController
{
    /** @var  InitialExpenseRepository */
    private $initialExpenseRepository;

    public function __construct(InitialExpenseRepository $initialExpenseRepo)
    {
        $this->initialExpenseRepository = $initialExpenseRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/initialExpenses",
     *      summary="Get a listing of the InitialExpenses.",
     *      tags={"InitialExpense"},
     *      description="Get all InitialExpenses",
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
     *                  @SWG\Items(ref="#/definitions/InitialExpense")
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
        $this->initialExpenseRepository->pushCriteria(new RequestCriteria($request));
        $this->initialExpenseRepository->pushCriteria(new LimitOffsetCriteria($request));
        $initialExpenses = $this->initialExpenseRepository->all();

        return $this->sendResponse($initialExpenses->toArray(), 'Initial Expenses retrieved successfully');
    }

    /**
     * @param CreateInitialExpenseAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/initialExpenses",
     *      summary="Store a newly created InitialExpense in storage",
     *      tags={"InitialExpense"},
     *      description="Store InitialExpense",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InitialExpense that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InitialExpense")
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
     *                  ref="#/definitions/InitialExpense"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInitialExpenseAPIRequest $request)
    {
        $input = $request->all();

        $initialExpenses = $this->initialExpenseRepository->create($input);

        return $this->sendResponse($initialExpenses->toArray(), 'Initial Expense saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/initialExpenses/{id}",
     *      summary="Display the specified InitialExpense",
     *      tags={"InitialExpense"},
     *      description="Get InitialExpense",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InitialExpense",
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
     *                  ref="#/definitions/InitialExpense"
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
        /** @var InitialExpense $initialExpense */
        $initialExpense = $this->initialExpenseRepository->findWithoutFail($id);

        if (empty($initialExpense)) {
            return $this->sendError('Initial Expense not found');
        }

        return $this->sendResponse($initialExpense->toArray(), 'Initial Expense retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateInitialExpenseAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/initialExpenses/{id}",
     *      summary="Update the specified InitialExpense in storage",
     *      tags={"InitialExpense"},
     *      description="Update InitialExpense",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InitialExpense",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InitialExpense that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InitialExpense")
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
     *                  ref="#/definitions/InitialExpense"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInitialExpenseAPIRequest $request)
    {
        $input = $request->all();

        /** @var InitialExpense $initialExpense */
        $initialExpense = $this->initialExpenseRepository->findWithoutFail($id);

        if (empty($initialExpense)) {
            return $this->sendError('Initial Expense not found');
        }

        $initialExpense = $this->initialExpenseRepository->update($input, $id);

        return $this->sendResponse($initialExpense->toArray(), 'InitialExpense updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/initialExpenses/{id}",
     *      summary="Remove the specified InitialExpense from storage",
     *      tags={"InitialExpense"},
     *      description="Delete InitialExpense",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InitialExpense",
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
        /** @var InitialExpense $initialExpense */
        $initialExpense = $this->initialExpenseRepository->findWithoutFail($id);

        if (empty($initialExpense)) {
            return $this->sendError('Initial Expense not found');
        }

        $initialExpense->delete();

        return $this->sendResponse($id, 'Initial Expense deleted successfully');
    }
}
