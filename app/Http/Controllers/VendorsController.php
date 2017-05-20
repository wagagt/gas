<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVendorsRequest;
use App\Http\Requests\UpdateVendorsRequest;
use App\Repositories\VendorsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VendorsController extends AppBaseController
{
    /** @var  VendorsRepository */
    private $vendorsRepository;

    public function __construct(VendorsRepository $vendorsRepo)
    {
        $this->vendorsRepository = $vendorsRepo;
    }

    /**
     * Display a listing of the Vendors.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->vendorsRepository->pushCriteria(new RequestCriteria($request));
        $vendors = $this->vendorsRepository->all();

        return view('vendors.index')
            ->with('vendors', $vendors);
    }

    /**
     * Show the form for creating a new Vendors.
     *
     * @return Response
     */
    public function create()
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created Vendors in storage.
     *
     * @param CreateVendorsRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorsRequest $request)
    {
        $input = $request->all();

        $vendors = $this->vendorsRepository->create($input);

        Flash::success('Vendors saved successfully.');

        return redirect(route('vendors.index'));
    }

    /**
     * Display the specified Vendors.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vendors = $this->vendorsRepository->findWithoutFail($id);

        if (empty($vendors)) {
            Flash::error('Vendors not found');

            return redirect(route('vendors.index'));
        }

        return view('vendors.show')->with('vendors', $vendors);
    }

    /**
     * Show the form for editing the specified Vendors.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vendors = $this->vendorsRepository->findWithoutFail($id);

        if (empty($vendors)) {
            Flash::error('Vendors not found');

            return redirect(route('vendors.index'));
        }

        return view('vendors.edit')->with('vendors', $vendors);
    }

    /**
     * Update the specified Vendors in storage.
     *
     * @param  int              $id
     * @param UpdateVendorsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorsRequest $request)
    {
        $vendors = $this->vendorsRepository->findWithoutFail($id);

        if (empty($vendors)) {
            Flash::error('Vendors not found');

            return redirect(route('vendors.index'));
        }

        $vendors = $this->vendorsRepository->update($request->all(), $id);

        Flash::success('Vendors updated successfully.');

        return redirect(route('vendors.index'));
    }

    /**
     * Remove the specified Vendors from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vendors = $this->vendorsRepository->findWithoutFail($id);

        if (empty($vendors)) {
            Flash::error('Vendors not found');

            return redirect(route('vendors.index'));
        }

        $this->vendorsRepository->delete($id);

        Flash::success('Vendors deleted successfully.');

        return redirect(route('vendors.index'));
    }
}
