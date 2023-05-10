<?php

namespace App\Http\Controllers;

use App\Models\Jezik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ocena;
use App\Models\Nastavnik;
use App\Models\User;
use App\Http\Resources\JezikResource;
use App\Http\Resources\JezikCollection;

class JezikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new JezikCollection(Jezik::all());
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
    public function show(Jezik $jezik)
    {
        return new JezikResource($jezik);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jezik $jezik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jezik $jezik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jezik $jezik)
    {
        //
    }
}
