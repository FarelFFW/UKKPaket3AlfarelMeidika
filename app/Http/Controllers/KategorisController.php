<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorekategorisRequest;
use App\Http\Requests\UpdatekategorisRequest;
use App\Models\kategoris;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class KategorisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(kategoris::query()->latest('id')->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorekategorisRequest $request): JsonResponse|RedirectResponse
    {
        $kategori = kategoris::query()->create($request->validated());

        if (! $request->expectsJson()) {
            return redirect()
                ->route('admin.kategori.index.page')
                ->with('success', 'Kategori berhasil ditambahkan.');
        }

        return response()->json($kategori, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(kategoris $kategoris)
    {
        return response()->json($kategoris);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategoris $kategoris)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekategorisRequest $request, kategoris $kategoris): JsonResponse|RedirectResponse
    {
        $kategoris->update($request->validated());

        if (! $request->expectsJson()) {
            return redirect()
                ->route('admin.kategori.index.page')
                ->with('success', 'Kategori berhasil diperbarui.');
        }

        return response()->json($kategoris->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategoris $kategoris): JsonResponse|RedirectResponse|Response
    {
        $kategoris->delete();

        if (! request()->expectsJson()) {
            return redirect()
                ->route('admin.kategori.index.page')
                ->with('success', 'Kategori berhasil dihapus.');
        }

        return response()->noContent();
    }
}
