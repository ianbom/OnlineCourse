<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContentRequest;
use App\Http\Requests\Admin\CourseRequest;
use App\Models\Category;
use App\Models\Content;
use App\Models\Course;
use App\Models\Materi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Course::all();
        return view('web.admin.course.index_course', ['course' => $course]);
    }


    public function dataCourse()
{
    $query = Course::query();
    return DataTables::of($query)
        ->addIndexColumn()
        ->addColumn('action', function ($course) {
            return view('web.admin.course.action_course', compact('course'))->render();
        })
        ->editColumn('created_at', function ($course) {
            return $course->created_at->format('d-m-Y');
        })
        ->rawColumns(['action'])
        ->make(true);
}

    public function create()
    {
        $category = Category::all();
        return view('web.admin.course.create_course', ['category' => $category]);
    }

    public function store(CourseRequest $request)
    {
        try {
            $courseData = $request->except('categories');


            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('course/image', 'public');
                $courseData['image'] = $imagePath;
            }


            if ($request->hasFile('video')) {
                $videoPath = $request->file('video')->store('course/video', 'public');
                $courseData['video'] = $videoPath;
            }

            $course = Course::create($courseData);


            if ($request->filled('category')) {
                $course->category()->attach($request->category);
            }

            return redirect()->back()->with('success', 'Course dan Kategori berhasil dibuat.');
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }






    public function show(string $id)
    {
        $course = Course::with('content.materi')->findOrFail($id);

        //return response()->json(['data' => $course]);
        return view('web.admin.course.show_course', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);

        return view('web.admin.course.edit_course', ['course' => $course]);
    }
    public function update(CourseRequest $request, string $id)
    {
        try {
            $course = Course::findOrFail($id);
            $courseData = $request->all();

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('course/image', 'public');
                $courseData['image'] = $imagePath;
            }

            if ($request->hasFile('video')) {
                $videoPath = $request->file('video')->store('course/video', 'public');
                $courseData['video'] = $videoPath;
            }

            $course->update($courseData);

            return redirect()->back()->with('success', 'Course dan Content berhasil diupdate.');
        } catch (\Throwable $th) {
           return response()->json(['error' => $th->getMessage()]);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->back()->with('success', 'Course berhasil dihapus.');
    }









// public function store2(CourseRequest $request)
// {
//     try {
//         $courseData = $request->all();

//     if ($request->hasFile('image')) {
//         $imagePath = $request->file('image')->store('course/image', 'public');
//         $courseData['image'] = $imagePath;
//     }

//     if ($request->hasFile('video')) {
//         $videoPath = $request->file('video')->store('course/video', 'public');
//         $courseData['video'] = $videoPath;
//     }

//     $course = Course::create($courseData);

//     $contents = $request->input('contents', []);
//     foreach ($contents as $content) {
//         Content::create([
//             'id_course' => $course->id_course,
//             'name_content' => $content['name_content']
//         ]);
//     }

//     return redirect()->back()->with('success', 'Course dan Content berhasil dibuat.');
//     } catch (\Throwable $th) {
//         return response()->json(['error' => $th->getMessage()], 500);
//     }

// }

// public function update2(CourseRequest $request, string $id)
// {
//     try {
//         $course = Course::findOrFail($id);
//         $courseData = $request->all();

//         if ($request->hasFile('image')) {
//             $imagePath = $request->file('image')->store('course/image', 'public');
//             $courseData['image'] = $imagePath;
//         }

//         if ($request->hasFile('video')) {
//             $videoPath = $request->file('video')->store('course/video', 'public');
//             $courseData['video'] = $videoPath;
//         }

//         $course->update($courseData);


//         $contents = $request->input('contents', []);
//         Content::where('id_course', $id)->delete();
//         foreach ($contents as $content) {
//             Content::create([
//                 'id_course' => $id,
//                 'name_content' => $content['name_content']
//             ]);
//         }
//         return redirect()->back()->with('success', 'Course dan Content berhasil diupdate.');
//     } catch (\Throwable $th) {
//        return response()->json(['error' => $th->getMessage()]);
//     }
// }



}
