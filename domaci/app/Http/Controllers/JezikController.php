<?php

namespace App\Http\Controllers;

use App\Models\Jezik;
use Illuminate\Http\Request;
use App\Models\Ocena;
use App\Models\Nastavnik;
use App\Models\User;
use App\Http\Resources\JezikResource;
use App\Http\Resources\JezikCollection;
use Illuminate\Support\Facades\Validator;

class JezikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new JezikCollection(Jezik::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'naziv' => 'required|string|max:150|unique:jeziks',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isUser())
            return response()->json('You are not authorized to create new jezici.'); 

        $jezik = Jezik::create([
            'naziv' => $request->naziv,
        ]);

        return response()->json(['Jezik is created successfully.', new JezikResource($jezik)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jezik  $jezik
     * @return \Illuminate\Http\Response
     */
    public function show(Jezik $jezik)
    {
        return new JezikResource($jezik);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jezik  $jezik
     * @return \Illuminate\Http\Response
     */
    public function edit(Jezik $jezik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jezik  $jezik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jezik $jezik)
    {
        $validator = Validator::make($request->all(), [
            'naziv' => 'required|string|max:150|unique:jeziks,naziv,' .$jezik->id,
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isUser())
            return response()->json('You are not authorized to update jezici.');     
        $jezik->naziv = $request->naziv;

        $jezik->save();

        return response()->json(['Jezik is updated successfully.', new JezikResource($jezik)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jezik  $jezik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jezik $jezik)
    {
        if(auth()->user()->isUser())
             return response()->json('You are not authorized to delete jezik.');

        $ocena = Ocena::get()->where('jezik', $jezik->id);
        if (count($ocena) > 0)
            return response()->json('You cannot delete jezik that have ocena.');

        $jezik->delete();

        return response()->json('Jezik is deleted successfully.');
    }
}
