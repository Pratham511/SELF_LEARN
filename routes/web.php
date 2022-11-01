<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Tag;

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
Route::get('/', function(){
    return View('register');
 });

Route::post('/register', [App\Http\Controllers\passportAuthController::class, 'store']);


Route::get('/index', [App\Http\Controllers\DataController::class, 'index'])->name('index');
Route::post('/create', [App\Http\Controllers\DataController::class, 'store']);
Route::post('/edit/{id}', [App\Http\Controllers\DataController::class, 'edit']);

Route::get('/delete/{id}', [App\Http\Controllers\DataController::class, 'delete']);
Route::get('/delete-multiple-records', [App\Http\Controllers\DataController::class, 'deleteMultipleRecords']);



Route::get('/form', function(){
    return View('submit_form.form');
});

Route::get('/lift', function(){
    return View('lift');
});

// post data through get route

Route::get('/store-data', [App\Http\Controllers\BioDataController::class, 'store']);

Route::get('/practice', function(){
    return View('submit_form.practice');
});

Route::get('tags',Tag::class)->name('tags');



// localization practice

Route::get('/contact', function(){
    return View('contact_us');
})->name('contact');

Route::get('lang/{lang}',[App\Http\Controllers\LanguageController::class,'switchLang'])->name('lang.switch');

// Route::get('/self', function(){
//     return View('self.form');
// })->name('contact');

Route::post('post',[App\Http\Controllers\PostController::class,'store'])->name('post.store');
Route::get('post',[App\Http\Controllers\PostController::class,'index'])->name('post.index');


