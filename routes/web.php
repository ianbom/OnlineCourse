<?php

use App\Http\Controllers\Admin\BundleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    Route::prefix('admin')->group(function () {
        Route::resource('bundle', BundleController::class)->except('index');
        Route::get('/index/bundle', [BundleController::class, 'index'])->name('bundle.index');

        Route::resource('course', CourseController::class)->except('index');
        Route::get('/index/course', [CourseController::class, 'index'])->name('course.index');
        Route::get('/data/course', [CourseController::class, 'dataCourse'])->name('course.data');

        Route::resource('content', ContentController::class)->except('index');
        Route::get('/index/content', [ContentController::class, 'index'])->name('content.index');
        Route::get('/search/content', [ContentController::class, 'searchContent'])->name('content.search');

        Route::resource('materi', MateriController::class)->except('index');
        Route::get('/index/materi', [MateriController::class, 'index'])->name('materi.index');

        Route::resource('category', CategoryController::class)->except('index');
        Route::get('/index/category', [CategoryController::class, 'index'])->name('category.index');

        Route::resource('user', UserController::class)->except('index');
        Route::get('/index/user', [UserController::class, 'index'])->name('user.index');

    });



require __DIR__.'/auth.php';
