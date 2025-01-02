<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Materi;
use App\Models\Save;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $userId = Auth::id();
        $checkSimpan = Save::where('id', $userId )->where('id_course', $course->id_course)->first();

        return view('web.user.kelas.show_kelas', ['course' => $course, 'checkSimpan' => $checkSimpan]);
    }

    public function belajar(Materi $materi){

        return view('web.user.kelas.belajar.belajar', ['materi' => $materi, 'idCourse' => $materi->id_course]);
    }


}
