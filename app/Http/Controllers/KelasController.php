<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Course;
use App\Models\Finished;
use App\Models\History;
use App\Models\Materi;
use App\Models\Question;
use App\Models\Save;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index()
    {
        $courses = Course::with([
            'materi' => function ($query) {
                $query->withCount('question');
            }
        ])->withCount([
            'materi',
            'materi as total_video' => function ($query) {
                $query->whereNotNull('video');
            }
        ])->get();
        $courses->transform(function ($c) {
            $c->total_quiz = $c->materi->sum('question_count');
            return $c;
        });

        $category = Category::all();
        $subCategory = SubCategory::all();
        return view('web.user.kelas.index_kelas', ['courses' => $courses, 'category' => $category, 'subCategory' => $subCategory]);
    }


    public function filterKelas(Request $request)
    {
         $subCategory = SubCategory::all();

        $query = Course::query();

        $category_id = $request->input('category_id');

        if ($category_id) {
            $selectedCategory = Category::with('subCategories')->find($category_id);

            if ($selectedCategory) {

                $query->whereHas('category', function ($q) use ($category_id) {
                    $q->where('category.id_category', $category_id);
                });

                if ($selectedCategory->subCategories->count() > 0) {
                    $subCategoryIds = $selectedCategory->subCategories->pluck('id_sub_category');

                    $query->orWhereHas('category', function ($q) use ($subCategoryIds) {
                        $q->whereIn('category.id_category', $subCategoryIds);
                    });
                }
            }
        }

        // Eager load relationships yang diperlukan
        $courses = $query->with([
            'materi' => function ($query) {
                $query->withCount('question');
            }
        ])->withCount([
            'materi',
            'materi as total_video' => function ($query) {
                $query->whereNotNull('video');
            }
        ])->get();
        $courses->transform(function ($c) {
            $c->total_quiz = $c->materi->sum('question_count');
            return $c;
        });
        $category = Category::all(); // untuk dropdown filter

        return view('web.user.kelas.index_kelas', [
            'courses' => $courses,
            'subCategory' => $subCategory,
            'category' => $category,
            'selectedCategory' => $category_id
        ]);
    }

    public function searchKelas(Request $request)
    {
        $search = $request->input('search');

        $course = Course::where('name_course', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->get();

        $html = view('web.user.components.list_kelas', compact('course'))->render();

        return response()->json(['html' => $html]);
    }

    public function show(Course $course)
    {
        $userId = Auth::id();
        $checkSimpan = Save::where('id', $userId)->where('id_course', $course->id_course)->first();
        $checkSelesai = Finished::where('id', $userId)->where('id_course', $course->id_course)->first();

        $subscription = checkSubs();

        if ($subscription) {
            $subscription = true;
        } else {
            $subscription = false;
        }

        // return response($subscription);
        return view('web.user.kelas.show_kelas', ['course' => $course, 'checkSimpan' => $checkSimpan, 'checkSelesai' => $checkSelesai, 'subscription' => $subscription]);
    }

    public function belajar(Materi $materi)
    {
        $userId = Auth::id();
        $question = Question::where('id_materi', $materi->id_materi)->first();
        $totalSoal = Question::where('id_materi', $materi->id_materi)->count();
        $nilai = Answer::where('id_materi', $materi->id_materi)->where('id', $userId)->where('is_correct', true)->count();

        History::create([
            'id' => $userId,
            'id_course' => $materi->id_course,
            'id_materi' => $materi->id_materi,
        ]);

        $subscription = checkSubs();

        if ($subscription) {
            $subscription = true;
        } else {
            $subscription = false;
        }

        return view(
            'web.user.kelas.belajar.belajar',
            [
                'materi' => $materi,
                'idCourse' => $materi->id_course,
                'question' => $question,
                'nilai' => $nilai,
                'totalSoal' => $totalSoal,
                'subscription' => $subscription
            ]
        );
    }

    public function selesaiKelas(Course $course)
    {

        $userId = Auth::id();
        Finished::create([
            'id' => $userId,
            'id_course' => $course->id_course,
        ]);

        return redirect()->back()->with('success', 'Kelas diselesaikan');
    }
    public function hapusSelesaiKelas(Course $course)
    {
        $userId = Auth::id();
        $finished = Finished::where('id', $userId)->where('id_course', $course->id_course)->first();
        $finished->delete();

        return redirect()->back()->with('success', 'Kelas diselesaikan dihapus');
    }
}
