<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ekgb;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('material.user.user');
    }

    public function getProfile()
    {
        $userId = Auth::id();
        $kgb = Ekgb::where('id_user', $userId)->first();

        if($kgb == null){
            return response()->json(['id' => 'null', 'kgb' => null]);
        }else{

            return response()->json(['id' => $userId, 'kgb' => $kgb]);
        }
    }
}
