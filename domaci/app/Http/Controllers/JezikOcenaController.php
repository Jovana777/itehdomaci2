<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ocena;
use App\Http\Resources\OcenaCollection;

class JezikOcenaController extends Controller
{
    public function index($jezik_id)
    {
        $ocena = Ocena::get()->where('jezik', $jezik_id);
        if (count($ocena) == 0)
            return response()->json('Data not found', 404);
        return new OcenaCollection($ocena);
    }
}
