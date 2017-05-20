<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInsuranceRateRequest;
use App\Http\Requests\UpdateInsuranceRateRequest;
use App\Repositories\InsuranceRateRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class InsuranceRateController extends AppBaseController
{
    /** @var  InsuranceRateRepository */
    private $insuranceRateRepository;

    public function __construct(InsuranceRateRepository $insuranceRateRepo)
    {
        $this->insuranceRateRepository = $insuranceRateRepo;
    }

    /**
     * Display a listing of the InsuranceRate.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->insuranceRateRepository->pushCriteria(new RequestCriteria($request));
        $insuranceRates = $this->insuranceRateRepository->all();

        return view('insurance_rates.index')
            ->with('insuranceRates', $insuranceRates);
    }

    /**
     * Show the form for creating a new InsuranceRate.
     *
     * @return Response
     */
    public function create()
    {
        return view('insurance_rates.create');
    }

    /**
     * Store a newly created InsuranceRate in storage.
     *
     * @param CreateInsuranceRateRequest $request
     *
     * @return Response
     */
    public function store(CreateInsuranceRateRequest $request)
    {
        $input = $request->all();

        $insuranceRate = $this->insuranceRateRepository->create($input);

        Flash::success('Insurance Rate saved successfully.');

        return redirect(route('insuranceRates.index'));
    }

    /**
     * Display the specified InsuranceRate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $insuranceRate = $this->insuranceRateRepository->findWithoutFail($id);

        if (empty($insuranceRate)) {
            Flash::error('Insurance Rate not found');

            return redirect(route('insuranceRates.index'));
        }

        return view('insurance_rates.show')->with('insuranceRate', $insuranceRate);
    }

    /**
     * Show the form for editing the specified InsuranceRate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $insuranceRate = $this->insuranceRateRepository->findWithoutFail($id);

        if (empty($insuranceRate)) {
            Flash::error('Insurance Rate not found');

            return redirect(route('insuranceRates.index'));
        }

        return view('insurance_rates.edit')->with('insuranceRate', $insuranceRate);
    }

    /**
     * Update the specified InsuranceRate in storage.
     *
     * @param  int              $id
     * @param UpdateInsuranceRateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInsuranceRateRequest $request)
    {
        $insuranceRate = $this->insuranceRateRepository->findWithoutFail($id);

        if (empty($insuranceRate)) {
            Flash::error('Insurance Rate not found');

            return redirect(route('insuranceRates.index'));
        }

        $insuranceRate = $this->insuranceRateRepository->update($request->all(), $id);

        Flash::success('Insurance Rate updated successfully.');

        return redirect(route('insuranceRates.index'));
    }

    /**
     * Remove the specified InsuranceRate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $insuranceRate = $this->insuranceRateRepository->findWithoutFail($id);

        if (empty($insuranceRate)) {
            Flash::error('Insurance Rate not found');

            return redirect(route('insuranceRates.index'));
        }

        $this->insuranceRateRepository->delete($id);

        Flash::success('Insurance Rate deleted successfully.');

        return redirect(route('insuranceRates.index'));
    }
}
