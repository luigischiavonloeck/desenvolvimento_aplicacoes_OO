<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bandeira;
use Illuminate\Http\Request;

class BandeiraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        response()->json(Bandeira::all());
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
    public function show(Bandeira $bandeira)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bandeira $bandeira)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bandeira $bandeira)
    {
        //
    }
}
