<?php

namespace App\Http\Controllers;

use App\Models\Ocena;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nastavnik;
use App\Models\Jezik;
use App\Http\Resources\OcenaResource;
use App\Http\Resources\OcenaCollection;

class OcenaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new OcenaCollection(Ocena::all());
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
    public function show(Ocena $ocena)
    {
        return new OcenaResource($ocena);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ocena $ocena)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ocena $ocena)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ocena $ocena)
    {
        //
    }
}
