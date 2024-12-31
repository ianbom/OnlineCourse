<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(){

        $course = Course::all();
        return view('web.user.kelas.index_kelas', ['course' => $course]);
    }

    public function searchKelas(Request $request){

        $search = $request->input('search');

        $course = Course::where('name_course', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%")
                    ->get();

        $html = view('web.user.components.list_kelas', compact('course'))->render();

        return response()->json(['html' => $html]);

    }

    public function show(Course $course){
        return view('web.user.kelas.show_kelas', ['course' => $course]);
    }


}
