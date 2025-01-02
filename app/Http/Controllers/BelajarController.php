<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Materi;
use App\Models\Note;
use App\Models\Save;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BelajarController extends Controller
{
    public function catat(Request $request, Materi $materi){
        try {
            $userId = Auth::id();
            Note::create([
                'id' => $userId,
                'id_materi' => $materi->id_materi,
                'note' => $request->note
            ]);
            // return response()->json(['success' => 'Bisa anjay']);
             return redirect()->route('kelas.belajar', $materi->id_materi)->with('success', 'Note created');
        } catch (\Throwable $th) {
           return response()->json(['error' => $th->getMessage()]);
        }
    }

    public function saveCourse(Course $course){

        $userId = Auth::id();
        Save::create([
            'id' => $userId,
            'id_course' => $course->id_course
        ]);
        return redirect()->back()->with('success', 'Course saved successfully');
    }

    public function deleteSaveCourse(Course $course) {
        $userId = Auth::id();
        $save = Save::where('id_course', $course->id_course)->where('id', $userId)->first();
        $save->delete();
        return redirect()->back()->with('success', 'Course deleted from saved');
    }
}
