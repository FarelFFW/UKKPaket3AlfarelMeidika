<?php

namespace App\Http\Controllers;

use App\Models\siswas;
use App\Http\Requests\StoresiswasRequest;
use App\Http\Requests\UpdatesiswasRequest;

class SiswasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(siswas::query()->latest('nis')->get());
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
    public function store(StoresiswasRequest $request)
    {
        $siswa = siswas::query()->create($request->validated());

        return response()->json($siswa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(siswas $siswas)
    {
        return response()->json($siswas);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(siswas $siswas)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesiswasRequest $request, siswas $siswas)
    {
        $siswas->update($request->validated());

        return response()->json($siswas->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(siswas $siswas)
    {
        $siswas->delete();

        return response()->noContent();
    }
}
