<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function index(){

        $course = Course::all();
        return view('web.user.ulasan.index_ulasan', ['course' => $course]);
    }

    public function store(Request $request, Course $course) {
        $userId = Auth::id();

        Rating::create([
            'id' => $userId,
            'id_course' => $course->id_course,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil ditambahkan');
    }

}
