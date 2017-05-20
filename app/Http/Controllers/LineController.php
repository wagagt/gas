<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLineRequest;
use App\Http\Requests\UpdateLineRequest;
use App\Repositories\LineRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Line;

class LineController extends AppBaseController
{
    /** @var  LineRepository */
    private $lineRepository;

    public function __construct(LineRepository $lineRepo)
    {
        $this->lineRepository = $lineRepo;
    }

    /**
     * Display a listing of the Line.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $lines = Line::SearchLine($request->get('line'))->orderBy('name', 'ASC')->paginate(10);
        //$lines = $this->lineRepository->all();

        return view('lines.index')
            ->with('lines', $lines);
    }

    /**
     * Show the form for creating a new Line.
     *
     * @return Response
     */
    public function create()
    {
        return view('lines.create');
    }

    /**
     * Store a newly created Line in storage.
     *
     * @param CreateLineRequest $request
     *
     * @return Response
     */
    public function store(CreateLineRequest $request)
    {
        $input = $request->all();

        $line = $this->lineRepository->create($input);

        Flash::success('Linea creada exitosamente.');

        return redirect(route('lines.index'));
    }

    /**
     * Display the specified Line.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $line = $this->lineRepository->findWithoutFail($id);

        if (empty($line)) {
            Flash::error('Linea no encontrada');

            return redirect(route('lines.index'));
        }

        return view('lines.show')->with('line', $line);
    }

    /**
     * Show the form for editing the specified Line.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $line = $this->lineRepository->findWithoutFail($id);

        if (empty($line)) {
            Flash::error('Linea no encontrada');

            return redirect(route('lines.index'));
        }

        return view('lines.edit')->with('line', $line);
    }

    /**
     * Update the specified Line in storage.
     *
     * @param  int              $id
     * @param UpdateLineRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLineRequest $request)
    {
        $line = $this->lineRepository->findWithoutFail($id);

        if (empty($line)) {
            Flash::error('Linea no encontrada');

            return redirect(route('lines.index'));
        }

        $line = $this->lineRepository->update($request->all(), $id);

        Flash::success('Linea actualizada exitosamente.');

        return redirect(route('lines.index'));
    }

    /**
     * Remove the specified Line from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $line = $this->lineRepository->findWithoutFail($id);

        if (empty($line)) {
            Flash::error('Linea no encontrada');

            return redirect(route('lines.index'));
        }

        $this->lineRepository->delete($id);

        Flash::success('Linea eliminada exitosamente.');

        return redirect(route('lines.index'));
    }
}
