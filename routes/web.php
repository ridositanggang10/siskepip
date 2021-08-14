<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\masyarakatController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\userController;
use App\Http\Controllers\FullCalenderController;
use GuzzleHttp\Middleware;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/',function(){
    return view('landing-page');
});

// for user or admin landing page
Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard',[pageController::class,'index'])->name('dashboard');
});


// route for admin
Route::group(['middleware' => ['auth','role:admin']], function(){
    Route::prefix('kritik-dan-saran')->group(function() {
        Route::get('/kds-lists',[adminController::class,'showKritikDanSaran'])->name('kds-lists');
        Route::get('/kds-detail/{id}',[adminController::class,'showKritikDanSaranDetail'])->name('kds-detail');
        Route::get('/download-foto/{foto}',[adminController::class,'downloadFotoSTD'])->name('download-foto');
        Route::get('/download-page/{id}',[adminController::class,'printPage'])->name('download-page');
        Route::get('/delete-record/{id}',[adminController::class,'deleteKDS'])->name('delete-record');
    });

    Route::prefix('kelola-pengguna')->group(function() {
        Route::get('/all-user',[adminController::class,'showUser'])->name('all-user');
        Route::get('/show-edit-form/{id}',[adminController::class,'showEditForm'])->name('show-edit-form');
        Route::post('/update-role/{id}',[adminController::class,'updateUserRole'])->name('update-role');
        Route::get('/delete-user/{id}',[adminController::class,'deleteUserAccount'])->name('delete-user');
    });

    Route::prefix('verifikasi')->group(function() {
        Route::get('/lists',[adminController::class,'showVerPage'])->name('lists');
        Route::get('/acc',[adminController::class,'showAcceptedPage'])->name('acc');
        Route::get('/reject',[adminController::class,'showRejectedPage'])->name('reject');
        Route::get('/create-user/{id}',[adminController::class,'createUser'])->name('create-user');
        Route::get('/reject-req/{id}',[adminController::class,'rejectRequestAccount'])->name('reject-req');
    });

    Route::prefix('ubah-katasandi')->group(function() {
        Route::get('/show-admin-form',[adminController::class,'showUbahPassword'])->name('show-admin-form');
        Route::post('/save-new-password',[userController::class, 'saveNewPassword'])->name('save-new-password');
    });

    Route::get('admin/seenNotif/{id}',[adminController::class,'seenNotif'])->name('seenNotif');

    Route::prefix('berita')->group(function() {
        Route::get('/berita-lists',[adminController::class,'showNewsLits'])->name('berita-lists');
        Route::get('/berita-lists/admin-contet/{id}', [adminController::class,'showParticularBerita'])->name('admin-content');
        Route::get('/delete-berita-admin/{id}',[adminController::class,'deleteBerita']);
    });

    Route::prefix('standar-layanan')->group(function() {
        Route::get('/std-lists',[adminController::class,'showSTDLits'])->name('std-lists');
        Route::get('/detail-std/{id}',[adminController::class,'showParticularStandarLayanan'])->name('detail-std');
        Route::get('/download-file/{file}',[adminController::class,'downloadFileSTD'])->name('download-file');
        Route::get('/download-foto/{file}',[adminController::class,'downloadFotoSTD'])->name('download-foto');
    });

    Route::get('fullcalender', [FullCalenderController::class, 'index']);
    Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);   
});



// route for user
Route::group(['middleware' => ['auth','role:user']], function(){
     // untuk berita
     Route::prefix('berita')->group(function () {
        Route::get('/create-berita',function(){
            return view('user.berita.create-berita');
        })->name('create-berita');
        Route::get('/update-berita-view/{berita_id}',[userController::class,'updateBeritaView'])->name('update-berita-view');
        Route::post('/update-berita/{id}',[userController::class,'updateBerita'])->name('update-berita');
        Route::get('/all-news', [userController::class,'showBerita'])->name('all-news');
        Route::get('/all-news/content/{id}', [userController::class,'showParticularBerita'])->name('content');
        Route::post('/create-berita',[userController::class,'createBerita']);
        Route::get('/delete-berita/{id}',[userController::class,'deleteBerita']);
    });

    // untuk standar layanan
    Route::prefix('standar-layanan')->group(function(){ 
        Route::get('/create-stdl', function(){
            return view('user.standar_layanan.create-standar-layanan');
        })->name('create-stdl');
        Route::post('/update-std/{id}',[userController::class,'updateStandarLayanan'])->name('update-std');
        Route::get('/show-to-update/{id}',[userController::class,'showDataToUpdate'])->name('show-to-update');
        Route::get('/download-std-file/{file}',[userController::class,'downloadFileSTD'])->name('download-std-file');
        Route::get('/download-std-foto/{file}',[userController::class,'downloadFotoSTD'])->name('download-std-foto');
        Route::get('/delete-std/{id}',[userController::class,'deleteStandarLayanan'])->name('delete-std');
        Route::get('/all-lists',[userController::class,'showStandarLayanan'])->name('all-lists');
        Route::get('/all-lists/{id}',[userController::class,'showParticularStandarLayanan']);
        Route::post('/post-stdl',[userController::class,'createStandarPelayanan']);
    });

    Route::prefix('request-akun')->group(function(){
        Route::get('/request-lists',[userController::class,'showRequestAccount'])->name('request-lists');
        Route::post('/make-request',[userController::class,'requestAccount'])->name('make-request');
        Route::post('/update-request/{id}',[userController::class,'updateRequestAccount'])->name('update-request');
        Route::get('/delete-request/{id}',[userController::class,'deleteRequestAccount'])->name('delete-request');
    });

    Route::prefix('kritik-dan-saran')->group(function(){
        Route::get('/all-lists',[userController::class,'showNewKritikDanSaran'])->name('all-lists');
        Route::get('/detail/{id}',[userController::class,'detailKritikDanSaran']);
        Route::get('/download-kds/{file}',[userController::class,'downloadFileKDS']);
        Route::post('/redirect-kds/{id}',[userController::class,'redirectKDS']);
        Route::get('/accept-kds/{id}',[userController::class,'acceptKritikdanSaran'])->name('accept-kds');
        Route::get('/reject-kds/{id}',[userController::class,'rejectKritikdanSaran'])->name('reject-kds');
        Route::get('/acc-lists',[userController::class,'showAcceptedKritikDanSaran'])->name('acc-lists');
        Route::get('/rejected-lists',[userController::class,'showRejectedKritikDanSaran'])->name('rejected-lists');
        Route::get('/redirect-lists',[userController::class,'showRedirectKritikDanSaran'])->name('redirect-lists');
        Route::get('/reject-redirected/{id}',[userController::class,'rejectRedirectedKritikdanSaran'])->name('reject-redirected');
        Route::get('/accept-redirected/{id}',[userController::class,'acceptRedirectedKritikdanSaran'])->name('accept-redirected');
        Route::get('/print-kds/{id}',[userController::class,'printPage'])->name('print-kds');
        Route::get('/show-to-public/{id}',[userController::class,'showKDSPublic'])->name('show-to-public');
    });

    Route::prefix('rating')->group(function(){
        Route::get('/create-form',[userController::class, 'showCreateRatingForm'])->name('create-form');
        Route::post('/post-form',[userController::class, 'storeQuestions'])->name('post-form');
        Route::get('/rating-lists',[userController::class,'showRatingList'])->name('rating-lists');
        Route::get('/rating-detail/{tag}',[userController::class,'viewRatingDetail'])->name('rating-detail');
        Route::get('/rating-edit-form/{tag}',[userController::class,'showEditForm'])->name('rating-edit-form');
        Route::post('/update-rating/{tag}',[userController::class,'storeEditedData'])->name('update-rating');
    });

    Route::prefix('password')->group(function(){
        Route::get('/show-form',[userController::class, 'showChangePasswordForm'])->name('show-form');
        Route::post('/change-password',[userController::class, 'saveNewPassword'])->name('change-password');
    });

    Route::get('user/userNotif/{id}',[userController::class,'seenNotif'])->name('userNotif');
});


// route untuk public user atau masyarakat
Route::prefix('public')->group(function() {
    Route::prefix('kds')->group(function() {
        Route::get('/kritik-dan-saran',[masyarakatController::class,'kritikDanSaran']);
        Route::post('/create-kritik-dan-saran',[masyarakatController::class,'postKritikDanSaran']);
        
    });

    Route::get('/beranda', function () {
        return view('people.beranda');
    });

    Route::get('/profil', function () {
        return view('people.profil');
    });

    Route::get('/berita', function() {
        return view('people.berita');
    });

    Route::get('/show-berita/{id}',[masyarakatController::class, 'getNewsDetail']);

    Route::get('/standar-layanan', function() {
        return view('people.standarlayanan');
    });

    Route::get('/standar-layanan/show/{id}',[masyarakatController::class,'showStandarLayanan']);
    Route::get('/download-std-file/people/{file}',[userController::class,'downloadFileSTD'])->name('download-std-file');
    Route::get('/download-std-foto/people/{file}',[userController::class,'downloadFotoSTD'])->name('download-std-foto');

    Route::prefix('rating')->group(function() {
        Route::get('/instansi',[masyarakatController::class,'showRatingForm'])->name('instansi');
        Route::get('/rating-category/{id}',[masyarakatController::class,'getAllRatingTag'])->name('rating-category');
        Route::post('/get-category',[masyarakatController::class,'getSelectedInstansi']);
        Route::get('/question-lists/{tag}',[masyarakatController::class,'getFormOne'])->name('question-lists');
        Route::post('/data-diri/{tag}',[masyarakatController::class,'getUserDataFormOne'])->name('data-diri');
        Route::get('/form-two/{tag}',[masyarakatController::class,'getFormTwo'])->name('form-two');
        Route::post('/form-two/{tag}',[masyarakatController::class,'postData'])->name('form-two-post');
        Route::get('/rating-results',[masyarakatController::class,'showRatingResults'])->name('rating-results');
    });

    Route::get('/tentang', function() {
        return view('people.tentang');
    });

    
});

require __DIR__.'/auth.php';
