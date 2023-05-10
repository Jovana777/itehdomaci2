<?php

namespace App\Http\Controllers;

use App\Models\Nastavnik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ocena;
use App\Models\Jezik;
use App\Models\User;
use App\Http\Resources\NastavnikResource;
use App\Http\Resources\NastavnikCollection;

class NastavnikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nastavniks=Nastavnik::all();
        return new NastavnikCollection($nastavniks);
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
    public function show(Nastavnik $nastavnik)
    {
        return new NastavnikResource($nastavnik);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nastavnik $nastavnik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nastavnik $nastavnik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nastavnik $nastavnik)
    {
        //
    }
}
