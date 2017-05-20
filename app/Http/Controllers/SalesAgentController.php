<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSalesAgentRequest;
use App\Http\Requests\UpdateSalesAgentRequest;
use App\Repositories\SalesAgentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SalesAgentController extends AppBaseController
{
    /** @var  SalesAgentRepository */
    private $salesAgentRepository;

    public function __construct(SalesAgentRepository $salesAgentRepo)
    {
        $this->salesAgentRepository = $salesAgentRepo;
    }

    /**
     * Display a listing of the SalesAgent.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->salesAgentRepository->pushCriteria(new RequestCriteria($request));
        $salesAgents = $this->salesAgentRepository->all();

        return view('sales_agents.index')
            ->with('salesAgents', $salesAgents);
    }

    /**
     * Show the form for creating a new SalesAgent.
     *
     * @return Response
     */
    public function create()
    {
        return view('sales_agents.create');
    }

    /**
     * Store a newly created SalesAgent in storage.
     *
     * @param CreateSalesAgentRequest $request
     *
     * @return Response
     */
    public function store(CreateSalesAgentRequest $request)
    {
        $input = $request->all();

        $salesAgent = $this->salesAgentRepository->create($input);

        Flash::success('Sales Agent saved successfully.');

        return redirect(route('salesAgents.index'));
    }

    /**
     * Display the specified SalesAgent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salesAgent = $this->salesAgentRepository->findWithoutFail($id);

        if (empty($salesAgent)) {
            Flash::error('Sales Agent not found');

            return redirect(route('salesAgents.index'));
        }

        return view('sales_agents.show')->with('salesAgent', $salesAgent);
    }

    /**
     * Show the form for editing the specified SalesAgent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salesAgent = $this->salesAgentRepository->findWithoutFail($id);

        if (empty($salesAgent)) {
            Flash::error('Sales Agent not found');

            return redirect(route('salesAgents.index'));
        }

        return view('sales_agents.edit')->with('salesAgent', $salesAgent);
    }

    /**
     * Update the specified SalesAgent in storage.
     *
     * @param  int              $id
     * @param UpdateSalesAgentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalesAgentRequest $request)
    {
        $salesAgent = $this->salesAgentRepository->findWithoutFail($id);

        if (empty($salesAgent)) {
            Flash::error('Sales Agent not found');

            return redirect(route('salesAgents.index'));
        }

        $salesAgent = $this->salesAgentRepository->update($request->all(), $id);

        Flash::success('Sales Agent updated successfully.');

        return redirect(route('salesAgents.index'));
    }

    /**
     * Remove the specified SalesAgent from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salesAgent = $this->salesAgentRepository->findWithoutFail($id);

        if (empty($salesAgent)) {
            Flash::error('Sales Agent not found');

            return redirect(route('salesAgents.index'));
        }

        $this->salesAgentRepository->delete($id);

        Flash::success('Sales Agent deleted successfully.');

        return redirect(route('salesAgents.index'));
    }
}
