<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Materi;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatatanController extends Controller
{
    public function index(){
        $userId = Auth::id();

        $course = Course::whereHas('materi.note', function ($note) use ($userId){
            $note->where('id', $userId);
        })->get();

        return view('web.user.catatan.index_catatan', ['course' => $course]);
    }

    public function search(Request $request)
{
    $userId = Auth::id();
    $search = $request->input('search');


    $course = Course::whereHas('materi.note', function ($query) use ($userId) {
        $query->where('id', $userId);
    })
    ->where(function ($query) use ($search) {

        $query->where('name_course', 'like', "%$search%")
              ->orWhere('description', 'like', "%$search%");
    })
    ->get();


    $html = view('web.user.components.list_catatan', compact('course'))->render();

    return response()->json(['html' => $html]);
}


    public function show(Course $course){
        $userId = Auth::id();

        $note = Note::whereHas('materi', function ($materi) use ($course) {
            $materi->where('id_course', $course->id_course);
        })->where('id', $userId)->get();

        return view('web.user.catatan.detail_catatan', ['course' => $course, 'note' => $note]);
    }

    public function delete(Note $note){
        $note->delete();
        return redirect()->back()->with('success', 'Catatan berhasil dihapus');
    }
}
