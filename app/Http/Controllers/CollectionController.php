<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    public function index(){

        $userId = Auth::id();

        $history = History::where('id', $userId)->orderby('updated_at', 'desc')->first();
        $lastRead = Course::where('id_course', $history->id_course)->first();

        $savedCourse = Course::whereHas('saveCourse', function ($save) use ($userId){
            $save->where('id', $userId);
        })->get();

        $finishedCourse = Course::whereHas('finished', function ($finished) use ($userId){
            $finished->where('id', $userId);
        })->get();

       
        return view('web.user.collection.index_collection', ['lastRead' => $lastRead, 'savedCourse' => $savedCourse, 'finishedCourse' => $finishedCourse]);
    }
}
