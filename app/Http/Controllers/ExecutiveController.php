<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExecutiveRequest;
use App\Http\Requests\UpdateExecutiveRequest;
use App\Repositories\ExecutiveRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ExecutiveController extends AppBaseController
{
    /** @var  ExecutiveRepository */
    private $executiveRepository;

    public function __construct(ExecutiveRepository $executiveRepo)
    {
        $this->executiveRepository = $executiveRepo;
    }

    /**
     * Display a listing of the Executive.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->executiveRepository->pushCriteria(new RequestCriteria($request));
        $executives = $this->executiveRepository->all();

        return view('executives.index')
            ->with('executives', $executives);
    }

    /**
     * Show the form for creating a new Executive.
     *
     * @return Response
     */
    public function create()
    {
        return view('executives.create');
    }

    /**
     * Store a newly created Executive in storage.
     *
     * @param CreateExecutiveRequest $request
     *
     * @return Response
     */
    public function store(CreateExecutiveRequest $request)
    {
        $input = $request->all();

        $executive = $this->executiveRepository->create($input);

        Flash::success('Executive saved successfully.');

        return redirect(route('executives.index'));
    }

    /**
     * Display the specified Executive.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $executive = $this->executiveRepository->findWithoutFail($id);

        if (empty($executive)) {
            Flash::error('Executive not found');

            return redirect(route('executives.index'));
        }

        return view('executives.show')->with('executive', $executive);
    }

    /**
     * Show the form for editing the specified Executive.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $executive = $this->executiveRepository->findWithoutFail($id);

        if (empty($executive)) {
            Flash::error('Executive not found');

            return redirect(route('executives.index'));
        }

        return view('executives.edit')->with('executive', $executive);
    }

    /**
     * Update the specified Executive in storage.
     *
     * @param  int              $id
     * @param UpdateExecutiveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExecutiveRequest $request)
    {
        $executive = $this->executiveRepository->findWithoutFail($id);

        if (empty($executive)) {
            Flash::error('Executive not found');

            return redirect(route('executives.index'));
        }

        $executive = $this->executiveRepository->update($request->all(), $id);

        Flash::success('Executive updated successfully.');

        return redirect(route('executives.index'));
    }

    /**
     * Remove the specified Executive from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $executive = $this->executiveRepository->findWithoutFail($id);

        if (empty($executive)) {
            Flash::error('No existe ejecitivo');

            return redirect(route('executives.index'));
        }

        $this->executiveRepository->delete($id);

        Flash::success('Executive deleted successfully.');

        return redirect(route('executives.index'));
    }
}
