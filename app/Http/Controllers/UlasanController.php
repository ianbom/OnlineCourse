<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index(){

        return view('web.user.ulasan.index_ulasan');
    }
}
