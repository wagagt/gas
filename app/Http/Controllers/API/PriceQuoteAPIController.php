<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePriceQuoteAPIRequest;
use App\Http\Requests\API\UpdatePriceQuoteAPIRequest;
use App\Models\PriceQuote;
use App\Repositories\PriceQuoteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PriceQuoteController
 * @package App\Http\Controllers\API
 */

class PriceQuoteAPIController extends AppBaseController
{
    /** @var  PriceQuoteRepository */
    private $priceQuoteRepository;

    public function __construct(PriceQuoteRepository $priceQuoteRepo)
    {
        $this->priceQuoteRepository = $priceQuoteRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/priceQuotes",
     *      summary="Get a listing of the PriceQuotes.",
     *      tags={"PriceQuote"},
     *      description="Get all PriceQuotes",
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
     *                  @SWG\Items(ref="#/definitions/PriceQuote")
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
        $this->priceQuoteRepository->pushCriteria(new RequestCriteria($request));
        $this->priceQuoteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $priceQuotes = $this->priceQuoteRepository->all();

        return $this->sendResponse($priceQuotes->toArray(), 'Price Quotes retrieved successfully');
    }

    /**
     * @param CreatePriceQuoteAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/priceQuotes",
     *      summary="Store a newly created PriceQuote in storage",
     *      tags={"PriceQuote"},
     *      description="Store PriceQuote",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PriceQuote that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PriceQuote")
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
     *                  ref="#/definitions/PriceQuote"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePriceQuoteAPIRequest $request)
    {
        $input = $request->all();

        $priceQuotes = $this->priceQuoteRepository->create($input);

        return $this->sendResponse($priceQuotes->toArray(), 'Price Quote saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/priceQuotes/{id}",
     *      summary="Display the specified PriceQuote",
     *      tags={"PriceQuote"},
     *      description="Get PriceQuote",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PriceQuote",
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
     *                  ref="#/definitions/PriceQuote"
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
        /** @var PriceQuote $priceQuote */
        $priceQuote = $this->priceQuoteRepository->findWithoutFail($id);

        if (empty($priceQuote)) {
            return $this->sendError('Price Quote not found');
        }

        return $this->sendResponse($priceQuote->toArray(), 'Price Quote retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePriceQuoteAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/priceQuotes/{id}",
     *      summary="Update the specified PriceQuote in storage",
     *      tags={"PriceQuote"},
     *      description="Update PriceQuote",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PriceQuote",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PriceQuote that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PriceQuote")
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
     *                  ref="#/definitions/PriceQuote"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePriceQuoteAPIRequest $request)
    {
        $input = $request->all();

        /** @var PriceQuote $priceQuote */
        $priceQuote = $this->priceQuoteRepository->findWithoutFail($id);

        if (empty($priceQuote)) {
            return $this->sendError('Price Quote not found');
        }

        $priceQuote = $this->priceQuoteRepository->update($input, $id);

        return $this->sendResponse($priceQuote->toArray(), 'PriceQuote updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/priceQuotes/{id}",
     *      summary="Remove the specified PriceQuote from storage",
     *      tags={"PriceQuote"},
     *      description="Delete PriceQuote",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PriceQuote",
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
        /** @var PriceQuote $priceQuote */
        $priceQuote = $this->priceQuoteRepository->findWithoutFail($id);

        if (empty($priceQuote)) {
            return $this->sendError('Price Quote not found');
        }

        $priceQuote->delete();

        return $this->sendResponse($id, 'Price Quote deleted successfully');
    }
}
