<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ocena;
use App\Http\Resources\OcenaCollection;

class NastavnikOcenaController extends Controller
{
    public function index($nastavnik_id)
    {
        $ocena = Ocena::get()->where('nastavnik', $nastavnik_id);
        if (count($ocena) == 0)
            return response()->json('Data not found', 404);
        return new OcenaCollection($ocena);
    }
}
