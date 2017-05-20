<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInitialExpenseRequest;
use App\Http\Requests\UpdateInitialExpenseRequest;
use App\Repositories\InitialExpenseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class InitialExpenseController extends AppBaseController
{
    /** @var  InitialExpenseRepository */
    private $initialExpenseRepository;

    public function __construct(InitialExpenseRepository $initialExpenseRepo)
    {
        $this->initialExpenseRepository = $initialExpenseRepo;
    }

    /**
     * Display a listing of the InitialExpense.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->initialExpenseRepository->pushCriteria(new RequestCriteria($request));
        $initialExpenses = $this->initialExpenseRepository->all();

        return view('initial_expenses.index')
            ->with('initialExpenses', $initialExpenses);
    }

    /**
     * Show the form for creating a new InitialExpense.
     *
     * @return Response
     */
    public function create()
    {
        return view('initial_expenses.create');
    }

    /**
     * Store a newly created InitialExpense in storage.
     *
     * @param CreateInitialExpenseRequest $request
     *
     * @return Response
     */
    public function store(CreateInitialExpenseRequest $request)
    {
        $input = $request->all();

        $initialExpense = $this->initialExpenseRepository->create($input);

        Flash::success('Initial Expense saved successfully.');

        return redirect(route('initialExpenses.index'));
    }

    /**
     * Display the specified InitialExpense.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $initialExpense = $this->initialExpenseRepository->findWithoutFail($id);

        if (empty($initialExpense)) {
            Flash::error('Initial Expense not found');

            return redirect(route('initialExpenses.index'));
        }

        return view('initial_expenses.show')->with('initialExpense', $initialExpense);
    }

    /**
     * Show the form for editing the specified InitialExpense.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $initialExpense = $this->initialExpenseRepository->findWithoutFail($id);

        if (empty($initialExpense)) {
            Flash::error('Initial Expense not found');

            return redirect(route('initialExpenses.index'));
        }

        return view('initial_expenses.edit')->with('initialExpense', $initialExpense);
    }

    /**
     * Update the specified InitialExpense in storage.
     *
     * @param  int              $id
     * @param UpdateInitialExpenseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInitialExpenseRequest $request)
    {
        $initialExpense = $this->initialExpenseRepository->findWithoutFail($id);

        if (empty($initialExpense)) {
            Flash::error('Initial Expense not found');

            return redirect(route('initialExpenses.index'));
        }

        $initialExpense = $this->initialExpenseRepository->update($request->all(), $id);

        Flash::success('Initial Expense updated successfully.');

        return redirect(route('initialExpenses.index'));
    }

    /**
     * Remove the specified InitialExpense from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $initialExpense = $this->initialExpenseRepository->findWithoutFail($id);

        if (empty($initialExpense)) {
            Flash::error('Initial Expense not found');

            return redirect(route('initialExpenses.index'));
        }

        $this->initialExpenseRepository->delete($id);

        Flash::success('Initial Expense deleted successfully.');

        return redirect(route('initialExpenses.index'));
    }
}
