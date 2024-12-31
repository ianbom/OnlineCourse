<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use Illuminate\Http\Request;

class PaketLanggananController extends Controller
{
    public function index(){
        $bundle = Bundle::all();

        return view('web.user.paket_langganan.index_paket', ['bundle' => $bundle]);
    }
}
