<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMarkRequest;
use App\Http\Requests\UpdateMarkRequest;
use App\Repositories\MarkRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Mark;

class MarkController extends AppBaseController
{
    /** @var  MarkRepository */
    private $markRepository;

    public function __construct(MarkRepository $markRepo)
    {
        $this->markRepository = $markRepo;
    }


    public function index(Request $request)
    {
        $marks = Mark::SearchMark($request->get('marca'))->orderBy('name', 'ASC')->paginate(10);

        return view('marks.index')
            ->with('marks', $marks);
    }

    /**
     * Show the form for creating a new Mark.
     *
     * @return Response
     */
    public function create()
    {
        return view('marks.create');
    }

    /**
     * Store a newly created Mark in storage.
     *
     * @param CreateMarkRequest $request
     *
     * @return Response
     */
    public function store(CreateMarkRequest $request)
    {
        $input = $request->all();

        $mark = $this->markRepository->create($input);

        Flash::success('Marca creada exitosamente.');

        return redirect(route('marks.index'));
    }

    /**
     * Display the specified Mark.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mark = $this->markRepository->findWithoutFail($id);

        if (empty($mark)) {
            Flash::error('Marca no econtrada');

            return redirect(route('marks.index'));
        }

        return view('marks.show')->with('mark', $mark);
    }

    /**
     * Show the form for editing the specified Mark.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mark = $this->markRepository->findWithoutFail($id);

        if (empty($mark)) {
            Flash::error('Marca no econtrada');

            return redirect(route('marks.index'));
        }

        return view('marks.edit')->with('mark', $mark);
    }

    /**
     * Update the specified Mark in storage.
     *
     * @param  int              $id
     * @param UpdateMarkRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMarkRequest $request)
    {
        $mark = $this->markRepository->findWithoutFail($id);

        if (empty($mark)) {
            Flash::error('Marca no econtrada');

            return redirect(route('marks.index'));
        }

        $mark = $this->markRepository->update($request->all(), $id);

        Flash::success('Marca actualizada exitosamente.');

        return redirect(route('marks.index'));
    }

    /**
     * Remove the specified Mark from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mark = $this->markRepository->findWithoutFail($id);

        if (empty($mark)) {
            Flash::error('Marca no encontrada');

            return redirect(route('marks.index'));
        }

        $this->markRepository->delete($id);

        Flash::success('Marca eliminada exitosamente.');

        return redirect(route('marks.index'));
    }
}
