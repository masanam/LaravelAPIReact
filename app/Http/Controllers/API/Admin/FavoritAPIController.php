<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateFavoritAPIRequest;
use App\Http\Requests\API\Admin\UpdateFavoritAPIRequest;
use App\Models\Admin\Favorit;
use App\Repositories\Admin\FavoritRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FavoritController
 * @package App\Http\Controllers\API\Admin
 */

class FavoritAPIController extends AppBaseController
{
    /** @var  FavoritRepository */
    private $favoritRepository;

    public function __construct(FavoritRepository $favoritRepo)
    {
        $this->favoritRepository = $favoritRepo;
    }

    /**
     * Display a listing of the Favorit.
     * GET|HEAD /favorits
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $favorits = $this->favoritRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($favorits->toArray(), 'Favorits retrieved successfully');
    }

    /**
     * Store a newly created Favorit in storage.
     * POST /favorits
     *
     * @param CreateFavoritAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFavoritAPIRequest $request)
    {
        $input = $request->all();

        $favorit = $this->favoritRepository->create($input);

        return $this->sendResponse($favorit->toArray(), 'Favorit saved successfully');
    }

    /**
     * Display the specified Favorit.
     * GET|HEAD /favorits/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Favorit $favorit */
        $favorit = $this->favoritRepository->find($id);

        if (empty($favorit)) {
            return $this->sendError('Favorit not found');
        }

        return $this->sendResponse($favorit->toArray(), 'Favorit retrieved successfully');
    }

    /**
     * Update the specified Favorit in storage.
     * PUT/PATCH /favorits/{id}
     *
     * @param int $id
     * @param UpdateFavoritAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFavoritAPIRequest $request)
    {
        $input = $request->all();

        /** @var Favorit $favorit */
        $favorit = $this->favoritRepository->find($id);

        if (empty($favorit)) {
            return $this->sendError('Favorit not found');
        }

        $favorit = $this->favoritRepository->update($input, $id);

        return $this->sendResponse($favorit->toArray(), 'Favorit updated successfully');
    }

    /**
     * Remove the specified Favorit from storage.
     * DELETE /favorits/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Favorit $favorit */
        $favorit = $this->favoritRepository->find($id);

        if (empty($favorit)) {
            return $this->sendError('Favorit not found');
        }

        $favorit->delete();

        return $this->sendSuccess('Favorit deleted successfully');
    }
}
