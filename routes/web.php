<?php

use App\Http\Controllers\Admin\BundleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\PemateriController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PaketLanggananController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\UlasanController;
use Illuminate\Support\Facades\Route;

Route::get('/mulaibelajar', function () {
    return view('web.user.mulaibelajar');
})->name('mulaibelajar');

// Route::get('/', function () {
//     return view('web.user.landing');
// })->name('landing');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [BundleController::class, 'landingpage'])->name('landing');

Route::middleware(['is_admin'])->prefix('admin')->group(function () {

    Route::resource('bundle', BundleController::class)->except('index');
    Route::get('/index/bundle', [BundleController::class, 'index'])->name('bundle.index');
    Route::get('/data/bundle', [BundleController::class, 'dataBundle'])->name('bundle.data');

    Route::resource('course', CourseController::class)->except('index');
    Route::get('/index/course', [CourseController::class, 'index'])->name('course.index');
    Route::get('/data/course', [CourseController::class, 'dataCourse'])->name('course.data');

    Route::resource('materi', MateriController::class)->except('index');
    Route::get('/index/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('/data/materi', [MateriController::class, 'dataMateri'])->name('materi.data');

    Route::get('/index/question/{materi}', [QuestionController::class, 'index'])->name('question.index');
    Route::get('/create/question/{materi}', [QuestionController::class, 'create'])->name('question.create');
    Route::get('/edit/question/{question}', [QuestionController::class, 'edit'])->name('question.edit');
    Route::post('/store/question', [QuestionController::class, 'store'])->name('question.store');
    Route::put('/update/question/{question}', [QuestionController::class, 'update'])->name('question.update');
    Route::delete('/delete/question/{question}', [QuestionController::class, 'destroy'])->name('question.delete');

    Route::resource('category', CategoryController::class)->except('index');
    Route::get('/index/category', [CategoryController::class, 'index'])->name('category.index');

    Route::resource('user', UserController::class)->except('index');
    Route::get('/index/user', [UserController::class, 'index'])->name('user.index');

    Route::resource('pemateri', PemateriController::class);
});

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/search', [KelasController::class, 'searchKelas'])->name('kelas.search');
    Route::get('/kelas/filter', [KelasController::class, 'filterKelas'])->name('kelas.filter');
    Route::get('/kelas/{course}', [KelasController::class, 'show'])->name('kelas.show');
    Route::post('/kelas/selesaikan/{course}', [KelasController::class, 'selesaiKelas'])->name('kelas.selesaikan');
    Route::delete('/kelas/hapusSelesaikan/{course}', action: [KelasController::class, 'hapusSelesaiKelas'])->name('kelas.hapusSelesaikan');
    Route::get('/belajar/{materi}', [KelasController::class, 'belajar'])->name('kelas.belajar');

    Route::get('/quiz/{materi}', [BelajarController::class, 'kerjakanQuiz'])->name('quiz.kerjakan');
    Route::post('/submit/quiz/{materi}', [BelajarController::class, 'submitQuiz'])->name('quiz.submit');

    Route::post('/catat/{materi}', [BelajarController::class, 'catat'])->name('belajar.catat');
    Route::post('/save/{course}', [BelajarController::class, 'saveCourse'])->name('belajar.save');
    Route::delete('/delete/save/{course}', [BelajarController::class, 'deleteSaveCourse'])->name('delete.save');

    Route::get('/paket-langganan', [PaketLanggananController::class, 'index'])->name('paket.index');
    Route::post('/order/{bundle}', [PaketLanggananController::class, 'order'])->name('order.store');

    Route::get('/order/{order}', [PembelianController::class, 'showOrder'])->name('order.show');
    Route::post('/order/pay/{order}', [PembelianController::class, 'bayarOrder'])->name('order.bayar');
    Route::put('/order/cancelled/{order}', [PembelianController::class, 'cancelOrder'])->name('order.cancel');
    Route::get('/order', [PembelianController::class, 'indexOrder'])->name('order.index');
    Route::get('/orders/search', [PembelianController::class, 'searchOrder'])->name('order.search');

    Route::get('/catatan', [CatatanController::class, 'index'])->name('catatan.index');
    Route::get('/catatan/search', [CatatanController::class, 'search'])->name('catatan.search');
    Route::get('/catatan/{course}', [CatatanController::class, 'show'])->name('catatan.show');
    Route::delete('/catatan/{note}', [CatatanController::class, 'delete'])->name('catatan.delete');


    Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
    Route::get('/ulasan/{course}', [UlasanController::class, 'show'])->name('ulasan.show');
    Route::get('/ulasan/search', [UlasanController::class, 'search'])->name('ulasan.search');
    Route::post('/ulasan/{course}', [UlasanController::class, 'store'])->name('ulasan.store');

    Route::get('/collection', [CollectionController::class, 'index'])->name('collection.index');

    Route::resource('sertifikat', SertifikatController::class);
});



require __DIR__ . '/auth.php';
