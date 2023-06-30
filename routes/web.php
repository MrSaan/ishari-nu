<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserInteractiveController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/offline', function () {
    return view('vendor.laravelpwa.offline');
});

Route::get('/support', [UserInteractiveController::class, 'support']);


// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/muhud/{id}', [UserInteractiveController::class, 'getCategoryMuhud']);
    Route::get('/reciters', [UserInteractiveController::class, 'reciters'])->name('reciters');
    Route::get('/play', [UserInteractiveController::class, 'Musics'])->name('music');
    Route::post('/loved', [UserInteractiveController::class, 'loved']);
    Route::get('/loved/{id}', [UserInteractiveController::class, 'getLoved'])->name('loved');
    Route::get('/detail-audio-pimpinan', [UserInteractiveController::class, 'getDetailAudioPimpinan']);
    Route::get('/rowi/{id}', [UserInteractiveController::class, 'getRowi']);

    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');

    Route::put('/profile/{user}', [UserController::class, 'edit']);

    Route::get('/json', [UserInteractiveController::class, 'json']);
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    //Route yang diizinkan hanya untuk pengguna dengan peran "admin"
    Route::get('/admin/create', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/pimpinan', [AdminController::class, 'pimpinan']);
    Route::get('/admin/audio', [AdminController::class, 'audio'])->name('audio');
    Route::get('/admin/daftarPimpinan', [AdminController::class, 'getPimpinan']);
    Route::get('/admin/daftarPimpinan/{pimpinan}/edit', [AdminController::class, 'editPimpinan']);
    Route::get('/admin/song', [AdminController::class, 'song']);

    Route::post('/admin/create/shalawat', [AdminController::class, 'addShalawat']);
    Route::post('/admin/create/pimpinan', [AdminController::class, 'addPimpinan']);
    Route::post('/admin/create/audio', [AdminController::class, 'addAudio']);
    Route::post('/admin/audio', [AdminController::class, 'checkMuhud']);
    Route::post('/admin/song', [AdminController::class, 'addSong']);

    Route::put('/admin/daftarPimpinan/{pimpinan}', [AdminController::class, 'edit']);
});

require __DIR__ . '/auth.php';
require __DIR__ . '/googleOAuth.php';
