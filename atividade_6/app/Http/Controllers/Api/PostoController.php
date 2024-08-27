<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Posto;
use Illuminate\Http\Request;

class PostoController extends Controller
{

    public function index()
    {
        response()->json(Posto::all());
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
    public function show(Posto $posto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posto $posto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posto $posto)
    {
        //
    }
}
