<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $ratedCourseIds = Rating::where('id', $userId)->pluck('id_course');

        $course = Course::all()->map(function ($course) use ($ratedCourseIds) {
            $course->isRated = $ratedCourseIds->contains($course->id_course);
            return $course;
        });

        return view('web.user.ulasan.index_ulasan', ['course' => $course]);
    }

    public function show(Course $course){
        return view('web.user.ulasan.detail_ulasan', ['course' => $course]);
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

    public function search(Request $request)
    {
        $search = $request->input('search');
        $userId = Auth::id();
        $ratedCourseIds = Rating::where('id', $userId)->pluck('id_course');

        $course = Course::where('name_course', 'like', "%{$search}%")
                         ->get()
                         ->map(function ($course) use ($ratedCourseIds) {
                             $course->isRated = $ratedCourseIds->contains($course->id_course);
                             return $course;
                         });

        // Render the view with the courses
        $html = view('web.user.components.list_ulasan', compact('course'))->render();

        return response()->json(['html' => $html]);
    }





}
