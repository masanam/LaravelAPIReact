<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\FavoritDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateFavoritRequest;
use App\Http\Requests\Admin\UpdateFavoritRequest;
use App\Repositories\Admin\FavoritRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FavoritController extends AppBaseController
{
    /** @var  FavoritRepository */
    private $favoritRepository;

    public function __construct(FavoritRepository $favoritRepo)
    {
        $this->favoritRepository = $favoritRepo;
    }

    /**
     * Display a listing of the Favorit.
     *
     * @param FavoritDataTable $favoritDataTable
     * @return Response
     */
    public function index(FavoritDataTable $favoritDataTable)
    {
        return $favoritDataTable->render('admin.favorits.index');
    }

    /**
     * Show the form for creating a new Favorit.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.favorits.create');
    }

    /**
     * Store a newly created Favorit in storage.
     *
     * @param CreateFavoritRequest $request
     *
     * @return Response
     */
    public function store(CreateFavoritRequest $request)
    {
        $input = $request->all();

        $favorit = $this->favoritRepository->create($input);

        Flash::success('Favorit saved successfully.');

        return redirect(route('admin.favorits.index'));
    }

    /**
     * Display the specified Favorit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $favorit = $this->favoritRepository->find($id);

        if (empty($favorit)) {
            Flash::error('Favorit not found');

            return redirect(route('admin.favorits.index'));
        }

        return view('admin.favorits.show')->with('favorit', $favorit);
    }

    /**
     * Show the form for editing the specified Favorit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $favorit = $this->favoritRepository->find($id);

        if (empty($favorit)) {
            Flash::error('Favorit not found');

            return redirect(route('admin.favorits.index'));
        }

        return view('admin.favorits.edit')->with('favorit', $favorit);
    }

    /**
     * Update the specified Favorit in storage.
     *
     * @param  int              $id
     * @param UpdateFavoritRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFavoritRequest $request)
    {
        $favorit = $this->favoritRepository->find($id);

        if (empty($favorit)) {
            Flash::error('Favorit not found');

            return redirect(route('admin.favorits.index'));
        }

        $favorit = $this->favoritRepository->update($request->all(), $id);

        Flash::success('Favorit updated successfully.');

        return redirect(route('admin.favorits.index'));
    }

    /**
     * Remove the specified Favorit from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $favorit = $this->favoritRepository->find($id);

        if (empty($favorit)) {
            Flash::error('Favorit not found');

            return redirect(route('admin.favorits.index'));
        }

        $this->favoritRepository->delete($id);

        Flash::success('Favorit deleted successfully.');

        return redirect(route('admin.favorits.index'));
    }
}
