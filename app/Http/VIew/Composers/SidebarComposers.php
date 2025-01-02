<?php

namespace App\Http\View\Composers;

use App\Models\Course;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class SidebarComposers
{
    /**
     * Logika untuk mengikat data ke tampilan.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        // $userId = Auth::id();

        $idCourse = $view->getData()['idCourse'] ?? null;

        $course = $idCourse ? Course::findOrFail($idCourse) : null;

        $view->with('course', $course);

    }
}
