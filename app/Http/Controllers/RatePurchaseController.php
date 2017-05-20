<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRatePurchaseRequest;
use App\Http\Requests\UpdateRatePurchaseRequest;
use App\Repositories\RatePurchaseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RatePurchaseController extends AppBaseController
{
    /** @var  RatePurchaseRepository */
    private $ratePurchaseRepository;

    public function __construct(RatePurchaseRepository $ratePurchaseRepo)
    {
        $this->ratePurchaseRepository = $ratePurchaseRepo;
    }

    /**
     * Display a listing of the RatePurchase.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ratePurchaseRepository->pushCriteria(new RequestCriteria($request));
        $ratePurchases = $this->ratePurchaseRepository->all();

        return view('rate_purchases.index')
            ->with('ratePurchases', $ratePurchases);
    }

    /**
     * Show the form for creating a new RatePurchase.
     *
     * @return Response
     */
    public function create()
    {
        return view('rate_purchases.create');
    }

    /**
     * Store a newly created RatePurchase in storage.
     *
     * @param CreateRatePurchaseRequest $request
     *
     * @return Response
     */
    public function store(CreateRatePurchaseRequest $request)
    {
        $input = $request->all();

        $ratePurchase = $this->ratePurchaseRepository->create($input);

        Flash::success('Rate Purchase saved successfully.');

        return redirect(route('ratePurchases.index'));
    }

    /**
     * Display the specified RatePurchase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ratePurchase = $this->ratePurchaseRepository->findWithoutFail($id);

        if (empty($ratePurchase)) {
            Flash::error('Rate Purchase not found');

            return redirect(route('ratePurchases.index'));
        }

        return view('rate_purchases.show')->with('ratePurchase', $ratePurchase);
    }

    /**
     * Show the form for editing the specified RatePurchase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ratePurchase = $this->ratePurchaseRepository->findWithoutFail($id);

        if (empty($ratePurchase)) {
            Flash::error('Rate Purchase not found');

            return redirect(route('ratePurchases.index'));
        }

        return view('rate_purchases.edit')->with('ratePurchase', $ratePurchase);
    }

    /**
     * Update the specified RatePurchase in storage.
     *
     * @param  int              $id
     * @param UpdateRatePurchaseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRatePurchaseRequest $request)
    {
        $ratePurchase = $this->ratePurchaseRepository->findWithoutFail($id);

        if (empty($ratePurchase)) {
            Flash::error('Rate Purchase not found');

            return redirect(route('ratePurchases.index'));
        }

        $ratePurchase = $this->ratePurchaseRepository->update($request->all(), $id);

        Flash::success('Rate Purchase updated successfully.');

        return redirect(route('ratePurchases.index'));
    }

    /**
     * Remove the specified RatePurchase from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ratePurchase = $this->ratePurchaseRepository->findWithoutFail($id);

        if (empty($ratePurchase)) {
            Flash::error('Rate Purchase not found');

            return redirect(route('ratePurchases.index'));
        }

        $this->ratePurchaseRepository->delete($id);

        Flash::success('Rate Purchase deleted successfully.');

        return redirect(route('ratePurchases.index'));
    }
}
