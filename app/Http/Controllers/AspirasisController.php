<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreaspirasisRequest;
use App\Http\Requests\UpdateaspirasisRequest;
use App\Models\aspirasis;

class AspirasisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            aspirasis::query()
                ->with(['inputAspirasi'])
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
    public function store(StoreaspirasisRequest $request)
    {
        $validated = $request->validated();

        if (! array_key_exists('status', $validated) || $validated['status'] === null) {
            $validated['status'] = 'menunggu';
        }

        $aspirasi = aspirasis::query()->create($validated);

        return response()->json($aspirasi->load(['inputAspirasi']), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(aspirasis $aspirasis)
    {
        return response()->json($aspirasis->load(['inputAspirasi']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(aspirasis $aspirasis)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateaspirasisRequest $request, aspirasis $aspirasis)
    {
        $aspirasis->update($request->validated());

        return response()->json($aspirasis->refresh()->load(['inputAspirasi']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(aspirasis $aspirasis)
    {
        $aspirasis->delete();

        return response()->noContent();
    }
}
