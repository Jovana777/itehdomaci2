<?php

namespace App\Http\Controllers;

use App\Models\Ocena;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nastavnik;
use App\Models\Jezik;
use App\Models\User;
use App\Http\Resources\OcenaResource;
use App\Http\Resources\OcenaCollection;
use Illuminate\Support\Facades\Validator;

class OcenaController extends Controller
{
    /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
    */
    public function index()
    {
        return new OcenaCollection(Ocena::all());
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
	* @param \Illuminate\Http\Request $request
	* @return \Illuminate\Http\Response
	*/
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'datumIVreme' => 'required|date',
            'jezik' => 'required|numeric|gte:1|lte:5',
            'note' => 'required|string|min:10',
            'nastavnik' => 'required|numeric|gte:1|lte:10',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isAdmin())
            return response()->json('You are not authorized to create new ocena.');     

        $ocena = Ocena::create([
            'datumIVreme' => $request->datumIVreme,
            'user' => auth()->user()->id,
            'jezik' => $request->jezik,
            'note' => $request->note,
            'nastavnik' => $request->nastavnik,
        ]);

        return response()->json(['Ocena is created successfully.', new OcenaResource($ocena)]);
    }

    /**
	* Display the specified resource.
	*
	* @param \App\Models\Ocena $ocena
	* @return \Illuminate\Http\Response
	*/
    public function show(Ocena $ocena)
    {
        return new OcenaResource($ocena);
    }

    /**
	* Show the form for editing the specified resource.
	*
	* @param \App\Models\Ocena $ocena
	* @return \Illuminate\Http\Response
	*/
    public function edit(Ocena $ocena)
    {
        //
    }

    /**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param \App\Models\Ocena $ocena
	* @return \Illuminate\Http\Response
	*/
    public function update(Request $request, Ocena $ocena)
    {
        $validator = Validator::make($request->all(), [
            'datumIVreme' => 'required|date',
            'user' => 'required|numeric|digits_between:1,5',
            'jezik' => 'required|numeric|gte:1|lte:5',
            'note' => 'required|string|min:10',
            'nastavnik' => 'required|numeric|gte:1|lte:10',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isAdmin())
            return response()->json('You are not authorized to update ocena.');    

        if(auth()->user()->id != $ocena->user)
            return response()->json('You are not authorized to update someone elses ocena.');      

        $ocena->datumIVreme = $request->datumIVreme;
        $ocena->user = auth()->user()->id;
        $ocena->jezik = $request->jezik;
        $ocena->note = $request->note;
        $ocena->nastavnik = $request->nastavnik;

        $ocena->save();

        return response()->json(['Ocena is updated successfully.', new OcenaResource($ocena)]);
    }

    /**
	* Remove the specified resource from storage.
	*
	* @param \App\Models\Ocena $ocena
	* @return \Illuminate\Http\Response
	*/
    public function destroy(Ocena $ocena)
    {
        if(auth()->user()->isAdmin())
            return response()->json('You are not authorized to delete ocena.');    

        if(auth()->user()->id != $ocena->user)
            return response()->json('You are not authorized to delete someone elses ocena.');

        $ocena->delete();

        return response()->json('Ocena is deleted successfully.');
    }
}
