<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateExecutiveAPIRequest;
use App\Http\Requests\API\UpdateExecutiveAPIRequest;
use App\Models\Executive;
use App\Repositories\ExecutiveRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ExecutiveController
 * @package App\Http\Controllers\API
 */

class ExecutiveAPIController extends AppBaseController
{
    /** @var  ExecutiveRepository */
    private $executiveRepository;

    public function __construct(ExecutiveRepository $executiveRepo)
    {
        $this->executiveRepository = $executiveRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/executives",
     *      summary="Get a listing of the Executives.",
     *      tags={"Executive"},
     *      description="Get all Executives",
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
     *                  @SWG\Items(ref="#/definitions/Executive")
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
        $this->executiveRepository->pushCriteria(new RequestCriteria($request));
        $this->executiveRepository->pushCriteria(new LimitOffsetCriteria($request));
        $executives = $this->executiveRepository->all();

        return $this->sendResponse($executives->toArray(), 'Executives retrieved successfully');
    }

    /**
     * @param CreateExecutiveAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/executives",
     *      summary="Store a newly created Executive in storage",
     *      tags={"Executive"},
     *      description="Store Executive",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Executive that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Executive")
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
     *                  ref="#/definitions/Executive"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateExecutiveAPIRequest $request)
    {
        $input = $request->all();

        $executives = $this->executiveRepository->create($input);

        return $this->sendResponse($executives->toArray(), 'Executive saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/executives/{id}",
     *      summary="Display the specified Executive",
     *      tags={"Executive"},
     *      description="Get Executive",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Executive",
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
     *                  ref="#/definitions/Executive"
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
        /** @var Executive $executive */
        $executive = $this->executiveRepository->findWithoutFail($id);

        if (empty($executive)) {
            return $this->sendError('Executive not found');
        }

        return $this->sendResponse($executive->toArray(), 'Executive retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateExecutiveAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/executives/{id}",
     *      summary="Update the specified Executive in storage",
     *      tags={"Executive"},
     *      description="Update Executive",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Executive",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Executive that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Executive")
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
     *                  ref="#/definitions/Executive"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateExecutiveAPIRequest $request)
    {
        $input = $request->all();

        /** @var Executive $executive */
        $executive = $this->executiveRepository->findWithoutFail($id);

        if (empty($executive)) {
            return $this->sendError('Executive not found');
        }

        $executive = $this->executiveRepository->update($input, $id);

        return $this->sendResponse($executive->toArray(), 'Executive updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/executives/{id}",
     *      summary="Remove the specified Executive from storage",
     *      tags={"Executive"},
     *      description="Delete Executive",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Executive",
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
        /** @var Executive $executive */
        $executive = $this->executiveRepository->findWithoutFail($id);

        if (empty($executive)) {
            return $this->sendError('Executive not found');
        }

        $executive->delete();

        return $this->sendResponse($id, 'Executive deleted successfully');
    }
}
