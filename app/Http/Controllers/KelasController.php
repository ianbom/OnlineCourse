<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Finished;
use App\Models\History;
use App\Models\Materi;
use App\Models\Question;
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
        $checkSelesai = Finished::where('id', $userId )->where('id_course', $course->id_course)->first();

        return view('web.user.kelas.show_kelas', ['course' => $course, 'checkSimpan' => $checkSimpan, 'checkSelesai' => $checkSelesai]);
    }

    public function belajar(Materi $materi){
        $userId = Auth::id();
        $question = Question::where('id_materi', $materi->id_materi)->first();
        $totalSoal = Question::where('id_materi', $materi->id_materi)->count();
        $nilai = Answer::where('id_materi', $materi->id_materi)->where('id', $userId)->where('is_correct', true)->count();

        History::create([
            'id' => $userId,
            'id_course' => $materi->id_course,
            'id_materi' => $materi->id_materi,
        ]);

        return view('web.user.kelas.belajar.belajar',
        ['materi' => $materi,
        'idCourse' => $materi->id_course,
        'question' => $question,
        'nilai' => $nilai,
        'totalSoal' => $totalSoal]);
    }

    public function selesaiKelas(Course $course){

        $userId = Auth::id();
        Finished::create([
            'id' => $userId,
            'id_course' => $course->id_course,
        ]);

        return redirect()->back()->with('success', 'Kelas diselesaikan');
    }
    public function hapusSelesaiKelas(Course $course){
        $userId = Auth::id();
        $finished = Finished::where('id', $userId)->where('id_course', $course->id_course)->first();
        $finished->delete();

        return redirect()->back()->with('success', 'Kelas diselesaikan dihapus');
    }




}
