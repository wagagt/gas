<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePriceQuoteRequest;
use App\Http\Requests\UpdatePriceQuoteRequest;
use App\Repositories\PriceQuoteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PriceQuoteController extends AppBaseController
{
    /** @var  PriceQuoteRepository */
    private $priceQuoteRepository;

    public function __construct(PriceQuoteRepository $priceQuoteRepo)
    {
        $this->priceQuoteRepository = $priceQuoteRepo;
    }

    /**
     * Display a listing of the PriceQuote.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->priceQuoteRepository->pushCriteria(new RequestCriteria($request));
        $priceQuotes = $this->priceQuoteRepository->all();

        return view('price_quotes.index')
            ->with('priceQuotes', $priceQuotes);
    }

    /**
     * Show the form for creating a new PriceQuote.
     *
     * @return Response
     */
    public function create()
    {
        return view('price_quotes.create');
    }

    /**
     * Store a newly created PriceQuote in storage.
     *
     * @param CreatePriceQuoteRequest $request
     *
     * @return Response
     */
    public function store(CreatePriceQuoteRequest $request)
    {
        $input = $request->all();

        $priceQuote = $this->priceQuoteRepository->create($input);

        Flash::success('Price Quote saved successfully.');

        return redirect(route('priceQuotes.index'));
    }

    /**
     * Display the specified PriceQuote.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $priceQuote = $this->priceQuoteRepository->findWithoutFail($id);

        if (empty($priceQuote)) {
            Flash::error('Price Quote not found');

            return redirect(route('priceQuotes.index'));
        }

        return view('price_quotes.show')->with('priceQuote', $priceQuote);
    }

    /**
     * Show the form for editing the specified PriceQuote.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $priceQuote = $this->priceQuoteRepository->findWithoutFail($id);

        if (empty($priceQuote)) {
            Flash::error('Price Quote not found');

            return redirect(route('priceQuotes.index'));
        }

        return view('price_quotes.edit')->with('priceQuote', $priceQuote);
    }

    /**
     * Update the specified PriceQuote in storage.
     *
     * @param  int              $id
     * @param UpdatePriceQuoteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePriceQuoteRequest $request)
    {
        $priceQuote = $this->priceQuoteRepository->findWithoutFail($id);

        if (empty($priceQuote)) {
            Flash::error('Price Quote not found');

            return redirect(route('priceQuotes.index'));
        }

        $priceQuote = $this->priceQuoteRepository->update($request->all(), $id);

        Flash::success('Price Quote updated successfully.');

        return redirect(route('priceQuotes.index'));
    }

    /**
     * Remove the specified PriceQuote from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $priceQuote = $this->priceQuoteRepository->findWithoutFail($id);

        if (empty($priceQuote)) {
            Flash::error('Price Quote not found');

            return redirect(route('priceQuotes.index'));
        }

        $this->priceQuoteRepository->delete($id);

        Flash::success('Price Quote deleted successfully.');

        return redirect(route('priceQuotes.index'));
    }
}
