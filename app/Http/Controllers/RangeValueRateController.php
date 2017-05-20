<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRangeValueRateRequest;
use App\Http\Requests\UpdateRangeValueRateRequest;
use App\Repositories\RangeValueRateRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RangeValueRateController extends AppBaseController
{
    /** @var  RangeValueRateRepository */
    private $rangeValueRateRepository;

    public function __construct(RangeValueRateRepository $rangeValueRateRepo)
    {
        $this->rangeValueRateRepository = $rangeValueRateRepo;
    }

    /**
     * Display a listing of the RangeValueRate.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rangeValueRateRepository->pushCriteria(new RequestCriteria($request));
        $rangeValueRates = $this->rangeValueRateRepository->all();

        return view('range_value_rates.index')
            ->with('rangeValueRates', $rangeValueRates);
    }

    /**
     * Show the form for creating a new RangeValueRate.
     *
     * @return Response
     */
    public function create()
    {
        return view('range_value_rates.create');
    }

    /**
     * Store a newly created RangeValueRate in storage.
     *
     * @param CreateRangeValueRateRequest $request
     *
     * @return Response
     */
    public function store(CreateRangeValueRateRequest $request)
    {
        $input = $request->all();

        $rangeValueRate = $this->rangeValueRateRepository->create($input);

        Flash::success('Range Value Rate saved successfully.');

        return redirect(route('rangeValueRates.index'));
    }

    /**
     * Display the specified RangeValueRate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rangeValueRate = $this->rangeValueRateRepository->findWithoutFail($id);

        if (empty($rangeValueRate)) {
            Flash::error('Range Value Rate not found');

            return redirect(route('rangeValueRates.index'));
        }

        return view('range_value_rates.show')->with('rangeValueRate', $rangeValueRate);
    }

    /**
     * Show the form for editing the specified RangeValueRate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rangeValueRate = $this->rangeValueRateRepository->findWithoutFail($id);

        if (empty($rangeValueRate)) {
            Flash::error('Range Value Rate not found');

            return redirect(route('rangeValueRates.index'));
        }

        return view('range_value_rates.edit')->with('rangeValueRate', $rangeValueRate);
    }

    /**
     * Update the specified RangeValueRate in storage.
     *
     * @param  int              $id
     * @param UpdateRangeValueRateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRangeValueRateRequest $request)
    {
        $rangeValueRate = $this->rangeValueRateRepository->findWithoutFail($id);

        if (empty($rangeValueRate)) {
            Flash::error('Range Value Rate not found');

            return redirect(route('rangeValueRates.index'));
        }

        $rangeValueRate = $this->rangeValueRateRepository->update($request->all(), $id);

        Flash::success('Range Value Rate updated successfully.');

        return redirect(route('rangeValueRates.index'));
    }

    /**
     * Remove the specified RangeValueRate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rangeValueRate = $this->rangeValueRateRepository->findWithoutFail($id);

        if (empty($rangeValueRate)) {
            Flash::error('Range Value Rate not found');

            return redirect(route('rangeValueRates.index'));
        }

        $this->rangeValueRateRepository->delete($id);

        Flash::success('Range Value Rate deleted successfully.');

        return redirect(route('rangeValueRates.index'));
    }
}
