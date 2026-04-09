<?php

namespace App\Http\Controllers;

use App\Models\admins;
use App\Http\Requests\StoreadminsRequest;
use App\Http\Requests\UpdateadminsRequest;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(admins::query()->latest('id')->get());
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
    public function store(StoreadminsRequest $request)
    {
        $admin = admins::query()->create($request->validated());

        return response()->json($admin, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(admins $admins)
    {
        return response()->json($admins);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admins $admins)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateadminsRequest $request, admins $admins)
    {
        $validated = $request->validated();

        if (($validated['password'] ?? null) === null) {
            unset($validated['password']);
        }

        $admins->update($validated);

        return response()->json($admins->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admins $admins)
    {
        $admins->delete();

        return response()->noContent();
    }
}
