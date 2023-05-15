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
use Illuminate\Support\Facades\Validator;

class NastavnikController extends Controller
{
    /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $nastavniks=Nastavnik::all();
        return new NastavnikCollection($nastavniks);
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
            'ime' => 'required|string|max:150',
            'brojTelefona' => 'required|string|max:150|unique:nastavniks',
            'godineIskustva' => 'required|numeric|lte:30|gte:1',
            'email' => 'required|email|unique:nastavniks',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isUser())
            return response()->json('You are not authorized to create new nastavniks.'); 
        $nastavnik = Nastavnik::create([
            'ime' => $request->ime,
            'brojTelefona' => $request->brojTelefona,
            'godineIskustva' => $request->godineIskustva,
            'email' => $request->email,
        ]);

        return response()->json(['Nastavnik is created successfully.', new NastavnikResource($nastavnik)]);
    }

    /**
	* Display the specified resource.
	*
	* @param \App\Models\Nastavnik $nastavnik
	* @return \Illuminate\Http\Response
	*/
    public function show(Nastavnik $nastavnik)
    {
        return new NastavnikResource($nastavnik);
    }

    /**
	* Show the form for editing the specified resource.
	*
	* @param \App\Models\Nastavnik $nastavnik
	* @return \Illuminate\Http\Response
	*/
    public function edit(Nastavnik $nastavnik)
    {
        //
    }

    /**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param \App\Models\Nastavnik $nastavnik
	* @return \Illuminate\Http\Response
	*/
    public function update(Request $request, Nastavnik $nastavnik)
    {
        $validator = Validator::make($request->all(), [
            'ime' => 'required|string|max:150',
            'brojTelefona' => 'required|string|max:150|unique:nastavniks,brojTelefona,'.$nastavnik->id,
            'godineIskustva' => 'required|numeric|lte:30|gte:1',
            'email' => 'required|email|unique:nastavniks,email,'.$nastavnik->id,
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());
         if(auth()->user()->isUser())
            return response()->json('You are not authorized to update nastavniks.');  
        $nastavnik->ime = $request->ime;
        $nastavnik->brojTelefona = $request->brojTelefona;
        $nastavnik->godineIskustva = $request->godineIskustva;
        $nastavnik->email = $request->email;

        $nastavnik->save();

        return response()->json(['Nastavnik is updated successfully.', new NastavnikResource($nastavnik)]);
    }

    /**
	* Remove the specified resource from storage.
	*
	* @param \App\Models\Nastavnik $nastavnik
	* @return \Illuminate\Http\Response
	*/
    public function destroy(Nastavnik $nastavnik)
    {
        if(auth()->user()->isUser())
            return response()->json('You are not authorized to delete nastavniks.');

        $nastavnik = Nastavnik::get()->where('nastavnik', $nastavnik_id);
        if (count($ocena) > 0)
                return response()->json('You cannot delete nastavniks that have ocenas.');   

        $nastavnik->delete();

        return response()->json('Nastavnik is deleted successfully.');
    }
}
