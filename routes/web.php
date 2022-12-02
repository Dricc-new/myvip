<?php

use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

/******************************************************Dricc****************************************************/

/******************************************************Dairon***************************************************/
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
/******************************************************Dricc****************************************************/
    Route::get('test',function(){
        return Auth::user()->id;
    });
/******************************************************Dairon***************************************************/
    Route::get('/dashboard', function () {return Inertia::render('Dashboard');})->name('dashboard');
    //Pon esta ruta mas bonita es para subir imagenes y videos para los post
    
    Route::prefix('/post')->name('post.')->group(function(){
        Route::get('/create',[PostController::class,'Create'])->name('create');
        Route::post('/addAttachments',[PostController::class,'AddAttachments'])->name('addAttachments');
        Route::post('/save',[PostController::class,'Save'])->name('save');
    });
});
