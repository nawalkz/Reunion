<?php

namespace App\Http\Controllers;

use App\Models\Reunion;
use Illuminate\Http\Request;

class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reunion $reunion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reunion $reunion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reunion $reunion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reunion $reunion)
    {
        //
    }

    public function search(Request $request)
{
    $query = Reunion::query();

    if ($request->has('user_id') && !empty($request->user_id)) {
        $query->where('user_id', $request->user_id);
    }

    if ($request->has('titre') && !empty($request->titre)) {
        $query->where('titre', 'like', '%' . $request->titre . '%');
    }

    $reunions = $query->paginate(10)->appends($request->query());

    return response()->json([
        'reunions' => view('users.reunions.reunion_partial', compact('reunions'))->render()
    ]);
}
}

