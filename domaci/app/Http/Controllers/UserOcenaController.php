<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ocena;
use App\Http\Resources\OcenaCollection;

class UserOcenaController extends Controller
{
    public function index($user_id)
    {
        $ocena = Ocena::get()->where('user', $user_id);
        if (count($ocena) == 0)
            return response()->json('Data not found', 404);
        return new OcenaCollection($ocena);
    }
    public function myocena()
    {
        if(auth()->user()->isAdmin())
            return response()->json('You are not allowed to have ocenas.');  
        $ocena = Ocena::get()->where('user', auth()->user()->id);
        if (count($ocena) == 0)
            return response()->json('Data not found', 404);
        return new OcenaCollection($ocena);

    }
}
