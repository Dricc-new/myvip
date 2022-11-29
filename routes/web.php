<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
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

/******************************************************Dairon***************************************************/
    Route::get('/dashboard', function () {return Inertia::render('Dashboard');})->name('dashboard');
    //Pon esta ruta mas bonita es para subir imagenes y videos para los post
    Route::get('/post/create',function(){
        return Inertia::render('Post/Create',['placeholder' => "Escriba un nuevo post, arrastre y suelte los archivos para añadirlos"]);
    })->name('post.create');
    Route::post('/post/create',function(Request $request){
        if($request->hasFile(key:'list'))
            return 'siiiiiiiiiiiiiiiiiiii';
    })->name('post.createpost');
});
