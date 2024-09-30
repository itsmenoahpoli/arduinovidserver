<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Services\VideosService;
use App\Http\Requests\Videos\CreateVideoRequest;
use App\Http\Requests\Videos\UpdateVideoRequest;

class VideosController extends Controller
{
    public function __construct(
        private readonly VideosService $videosService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $result = $this->videosService->getUnpaginated();

        return response()->json($result, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateVideoRequest $request)
    {
        $result = $this->videosService->create($request->validated());

        return response()->json($result, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = $this->videosService->getById($id);

        return response()->json($result, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, string $id)
    {
        $result = $this->videosService->updateById($id, $request->validated());

        return response()->json($result, Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->videosService->deleteById($id);

        return response()->json($result, Response::HTTP_NO_CONTENT);
    }
}
