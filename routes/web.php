<?php

use App\Http\Controllers\AcountController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
use Illuminate\Foundation\Application;
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

Route::prefix('/profile/{id}')->name('profile.')->group(function(){
    Route::get('/posts',[AcountController::class,'posts'])->name('posts');
    Route::get('/medias',[AcountController::class,'medias'])->name('medias');    
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
/******************************************************Dricc****************************************************/
    Route::get('test',function(){
        return Inertia::render('default');
    });

    Route::prefix('/notifications')->name('notifications.')->group(function(){
        Route::get('/all',NotificationsController::class)->name('all');
        Route::get('/messages',[NotificationsController::class,'messages'])->name('messages');
        Route::get('/subscriptions',[NotificationsController::class,'subscriptions'])->name('subscriptions');
        Route::get('/tips',[NotificationsController::class,'tips'])->name('tips');
    });

    Route::prefix('/posts')->name('post.')->group(function(){
        Route::get('/new',PostController::class)->name('new');
        Route::get('/edit/{id}',[PostController::class,'edit'])->name('edit');
        Route::post('/addAttach',[PostController::class,'addAttach'])->name('addAttach');
        Route::post('/delAttach',[PostController::class,'delAttach'])->name('delAttach');
        Route::post('/save',[PostController::class,'save'])->name('save');
    });

    Route::prefix('/settings')->name('settings.')->group(function(){
        Route::get('/theme',[SettingsController::class,'theme'])->name('theme');
    });

    Route::get('home',function(){
        return Inertia::render('Home',['theme' => 'red-600']);
    })->name('home');
/******************************************************Dairon***************************************************/
    Route::get('/dashboard', function () {return Inertia::render('Dashboard');})->name('dashboard');
    
});
