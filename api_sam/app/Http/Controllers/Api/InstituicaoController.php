<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstituicaoRequest;
use App\Application\Services\InstituicaoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class InstituicaoController extends Controller
{
    private InstituicaoService $instituicaoService;

    public function __construct(InstituicaoService $instituicaoService)
    {
        $this->instituicaoService = $instituicaoService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->instituicaoService->listAll());
    }

    public function store(InstituicaoRequest $request): JsonResponse
    {
        $instituicao = $this->instituicaoService->store($request->validated());
        return response()->json($instituicao, Response::HTTP_CREATED);
    }

    public function show(string $id): JsonResponse
    {
        return response()->json($this->instituicaoService->find($id));
    }

    public function update(InstituicaoRequest $request, string $id): JsonResponse
    {
        $instituicao = $this->instituicaoService->update($id, $request->validated());
        return response()->json($instituicao);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->instituicaoService->delete($id);
        return response()->json(null, Response::HTTP_NO_CONTENT); // Retornando um JsonResponse
    }
}
