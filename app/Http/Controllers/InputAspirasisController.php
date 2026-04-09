<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeinput_aspirasisRequest;
use App\Http\Requests\Updateinput_aspirasisRequest;
use App\Models\input_aspirasis;

class InputAspirasisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            input_aspirasis::query()
                ->with(['siswa', 'kategori'])
                ->latest('id')
                ->get()
        );
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
    public function store(Storeinput_aspirasisRequest $request)
    {
        $inputAspirasi = input_aspirasis::query()->create($request->validated());

        return response()->json($inputAspirasi->load(['siswa', 'kategori']), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(input_aspirasis $input_aspirasis)
    {
        return response()->json($input_aspirasis->load(['siswa', 'kategori']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(input_aspirasis $input_aspirasis)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateinput_aspirasisRequest $request, input_aspirasis $input_aspirasis)
    {
        $input_aspirasis->update($request->validated());

        return response()->json($input_aspirasis->refresh()->load(['siswa', 'kategori']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(input_aspirasis $input_aspirasis)
    {
        $input_aspirasis->delete();

        return response()->noContent();
    }
}
