<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Materi;
use App\Models\Note;
use App\Models\Option;
use App\Models\Question;
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

    public function kerjakanQuiz(Materi $materi){
        $question = Question::with('option')->where('id_materi', $materi->id_materi)->get();

        // return response()->json(['question' => $question]);

        return view('web.user.kelas.belajar.quiz', ['question' => $question, 'materi' => $materi, 'idCourse' => $materi->id_course]);
    }

        public function submitQuiz(Request $request, Materi $materi)
    {
        $validated = $request->validate([
            'answers' => 'required|array',
        ]);

        $userId = Auth::id();
        $answers = $validated['answers'];

        // dd($answers);

        try {
            foreach ($answers as $questionId => $optionId) {
                $option = Option::find($optionId);

                if (!$option) {
                    return back()->withErrors(['error' => "Invalid option selected for question ID: $questionId"]);
                }

                $answer = Answer::updateOrCreate(
                    [
                        'id_materi' => $materi->id_materi,
                        'id_question' => $questionId,
                        'id' => $userId,
                    ],
                    [
                        'id_option' => $optionId,
                        'is_correct' => $option->is_correct ?? false,
                    ]
                );
            }

            return response($answer);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}