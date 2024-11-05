<?php

use App\Http\Controllers\AddschedulingesController;
use App\Http\Controllers\AdminarticlesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FinancialsController;
use App\Http\Controllers\FullschedulesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MinipagefinancesController;
use App\Http\Controllers\MinipageschedulesController;
use App\Http\Controllers\OutcomesController;
use App\Http\Controllers\petaniPadiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('articles', ArticleController::class);
Route::resource('admin', AdminController::class);
Route::get('/incomes', function () {
    return view('incomes');;
});
Route::get('/outcomes', function () {
    return view(' outcomes');;
});
Route::resource('minipagefinances', MinipagefinancesController::class);
Route::resource('minipageschedules', MinipageschedulesController::class);
Route::get('userprofile', [UserProfileController::class, 'index']);

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')
        ->name('login');
    Route::post('/login', 'authenticate')
        ->name('signin');

    Route::post('/signout', 'signout')->name('logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'show')
        ->name('register');
    Route::post('/signup', 'regist')
        ->name('signup');
});

Route::controller(AdminarticlesController::class)->group(function () {
    Route::get('/adminarticles', 'show')
        ->name('addarticles');
    Route::post('/adminarticles', 'add')
        ->name('addarticle');
    Route::delete('/delete/{id}', 'delete')
        ->name('delete');
    Route::put('/adminarticles/{id}', 'update')
        ->name('update');
});

Route::controller(UserProfileController::class)->group(function () {
    Route::get('/userprofile', 'index')
        ->name('userprofile');
    Route::put('/userprofile', 'updateUser')
        ->name('updateUser');
});

Route::controller(petaniPadiController::class)->group(function () {
    //function user
    Route::get('/schedules', 'loginPetani')
        ->name('schedules');
    Route::get('/financials', 'viewCatatan')
        ->name('financials');
    Route::post('/save-Penjadwalan', 'savePenjadwalan')
        ->name('save-Penjadwalan');
    Route::post('/save-Financials', 'saveFinacials')
        ->name('save-Financials');

    Route::get('/delete-Penjadwalan/{id}', 'deletePenjadwalan')
        ->name('delete-Penjadwalan');

    // Group routes that require authentication
    Route::middleware(['auth'])->group(function () {
        // Route for the add scheduling page
        Route::get('/addschedulinges', function () {
            return view('addschedulinges');
        });
        // Route for saving penjadwalan
        Route::post('/save-Penjadwalan', 'savePenjadwalan');
    });
});
