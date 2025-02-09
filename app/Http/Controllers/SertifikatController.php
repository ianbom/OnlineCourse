<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function index(){
        $course = Course::with('materi')->get()->map(function ($course) {
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
