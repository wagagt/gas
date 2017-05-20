<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTirRateRequest;
use App\Http\Requests\UpdateTirRateRequest;
use App\Repositories\TirRateRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TirRateController extends AppBaseController
{
    /** @var  TirRateRepository */
    private $tirRateRepository;

    public function __construct(TirRateRepository $tirRateRepo)
    {
        $this->tirRateRepository = $tirRateRepo;
    }

    /**
     * Display a listing of the TirRate.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tirRateRepository->pushCriteria(new RequestCriteria($request));
        $tirRates = $this->tirRateRepository->all();

        return view('tir_rates.index')
            ->with('tirRates', $tirRates);
    }

    /**
     * Show the form for creating a new TirRate.
     *
     * @return Response
     */
    public function create()
    {
        return view('tir_rates.create');
    }

    /**
     * Store a newly created TirRate in storage.
     *
     * @param CreateTirRateRequest $request
     *
     * @return Response
     */
    public function store(CreateTirRateRequest $request)
    {
        $input = $request->all();

        $tirRate = $this->tirRateRepository->create($input);

        Flash::success('Tir Rate saved successfully.');

        return redirect(route('tirRates.index'));
    }

    /**
     * Display the specified TirRate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tirRate = $this->tirRateRepository->findWithoutFail($id);

        if (empty($tirRate)) {
            Flash::error('Tir Rate not found');

            return redirect(route('tirRates.index'));
        }

        return view('tir_rates.show')->with('tirRate', $tirRate);
    }

    /**
     * Show the form for editing the specified TirRate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tirRate = $this->tirRateRepository->findWithoutFail($id);

        if (empty($tirRate)) {
            Flash::error('Tir Rate not found');

            return redirect(route('tirRates.index'));
        }

        return view('tir_rates.edit')->with('tirRate', $tirRate);
    }

    /**
     * Update the specified TirRate in storage.
     *
     * @param  int              $id
     * @param UpdateTirRateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTirRateRequest $request)
    {
        $tirRate = $this->tirRateRepository->findWithoutFail($id);

        if (empty($tirRate)) {
            Flash::error('Tir Rate not found');

            return redirect(route('tirRates.index'));
        }

        $tirRate = $this->tirRateRepository->update($request->all(), $id);

        Flash::success('Tir Rate updated successfully.');

        return redirect(route('tirRates.index'));
    }

    /**
     * Remove the specified TirRate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tirRate = $this->tirRateRepository->findWithoutFail($id);

        if (empty($tirRate)) {
            Flash::error('Tir Rate not found');

            return redirect(route('tirRates.index'));
        }

        $this->tirRateRepository->delete($id);

        Flash::success('Tir Rate deleted successfully.');

        return redirect(route('tirRates.index'));
    }
}
