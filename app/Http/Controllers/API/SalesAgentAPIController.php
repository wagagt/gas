<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSalesAgentAPIRequest;
use App\Http\Requests\API\UpdateSalesAgentAPIRequest;
use App\Models\SalesAgent;
use App\Repositories\SalesAgentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SalesAgentController
 * @package App\Http\Controllers\API
 */

class SalesAgentAPIController extends AppBaseController
{
    /** @var  SalesAgentRepository */
    private $salesAgentRepository;

    public function __construct(SalesAgentRepository $salesAgentRepo)
    {
        $this->salesAgentRepository = $salesAgentRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/salesAgents",
     *      summary="Get a listing of the SalesAgents.",
     *      tags={"SalesAgent"},
     *      description="Get all SalesAgents",
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
     *                  @SWG\Items(ref="#/definitions/SalesAgent")
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
        $this->salesAgentRepository->pushCriteria(new RequestCriteria($request));
        $this->salesAgentRepository->pushCriteria(new LimitOffsetCriteria($request));
        $salesAgents = $this->salesAgentRepository->all();

        return $this->sendResponse($salesAgents->toArray(), 'Sales Agents retrieved successfully');
    }

    /**
     * @param CreateSalesAgentAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/salesAgents",
     *      summary="Store a newly created SalesAgent in storage",
     *      tags={"SalesAgent"},
     *      description="Store SalesAgent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SalesAgent that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SalesAgent")
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
     *                  ref="#/definitions/SalesAgent"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSalesAgentAPIRequest $request)
    {
        $input = $request->all();

        $salesAgents = $this->salesAgentRepository->create($input);

        return $this->sendResponse($salesAgents->toArray(), 'Sales Agent saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/salesAgents/{id}",
     *      summary="Display the specified SalesAgent",
     *      tags={"SalesAgent"},
     *      description="Get SalesAgent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SalesAgent",
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
     *                  ref="#/definitions/SalesAgent"
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
        /** @var SalesAgent $salesAgent */
        $salesAgent = $this->salesAgentRepository->findWithoutFail($id);

        if (empty($salesAgent)) {
            return $this->sendError('Sales Agent not found');
        }

        return $this->sendResponse($salesAgent->toArray(), 'Sales Agent retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSalesAgentAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/salesAgents/{id}",
     *      summary="Update the specified SalesAgent in storage",
     *      tags={"SalesAgent"},
     *      description="Update SalesAgent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SalesAgent",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SalesAgent that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SalesAgent")
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
     *                  ref="#/definitions/SalesAgent"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSalesAgentAPIRequest $request)
    {
        $input = $request->all();

        /** @var SalesAgent $salesAgent */
        $salesAgent = $this->salesAgentRepository->findWithoutFail($id);

        if (empty($salesAgent)) {
            return $this->sendError('Sales Agent not found');
        }

        $salesAgent = $this->salesAgentRepository->update($input, $id);

        return $this->sendResponse($salesAgent->toArray(), 'SalesAgent updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/salesAgents/{id}",
     *      summary="Remove the specified SalesAgent from storage",
     *      tags={"SalesAgent"},
     *      description="Delete SalesAgent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SalesAgent",
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
        /** @var SalesAgent $salesAgent */
        $salesAgent = $this->salesAgentRepository->findWithoutFail($id);

        if (empty($salesAgent)) {
            return $this->sendError('Sales Agent not found');
        }

        $salesAgent->delete();

        return $this->sendResponse($id, 'Sales Agent deleted successfully');
    }
}
