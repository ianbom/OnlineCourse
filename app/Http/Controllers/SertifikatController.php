<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Materi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SertifikatController extends Controller
{
    public function index(){
        $user = Auth::user();

        $courseStats = Materi::leftJoin('question', 'materi.id_materi', '=', 'question.id_materi')
            ->leftJoin('answer', function ($join) use ($user) {
                $join->on('question.id_question', '=', 'answer.id_question')
                    ->where('answer.is_correct', true)
                    ->where('answer.id', $user->id);
            })
            ->select(
                'materi.id_course',
                DB::raw('COUNT(DISTINCT question.id_question) as total_questions'),
                DB::raw('COUNT(DISTINCT answer.id_answer) as total_correct')
            )
            ->groupBy('materi.id_course')
            ->havingRaw('total_correct >= (total_questions / 2)')
            ->get();

        $courseIds = $courseStats->pluck('id_course');




        $course = Course::with('materi')->whereIn('id_course', $courseIds)->get()->map(function ($course) {
            $course->setAttribute('total_quiz', $course->materi->where('type', 'quiz')->count());
            $course->setAttribute('total_materi', $course->materi->where('type', 'materi')->count());
            $course->setAttribute('total_modul', $course->materi->where('type', 'modul')->count());

            return $course;
        });
        return view('web.user.sertifikat.index_sertifikat', ['course' => $course]);
    }

    public function show(Course $sertifikat){
        $data = [
            'course' => $sertifikat->name_course,
            'user' => auth()->user()->name,
            'date' => now()->format('d F Y'),
        ];

        $pdf = Pdf::loadView('web.user.sertifikat.template_sertifikat', $data)->setPaper('A4', 'landscape');

        return $pdf->download('sertifikat-' . $sertifikat->name_course . '.pdf');
    }
}
