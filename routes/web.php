<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Answer qism
Route::view('ansDesk','answerDesk');

// Question
Route::get('questions',[QuestionController::class,'show']);

// Start
Route::view('start','start');

// End
Route::view('end','end');

// Add qism
Route::post('add',[QuestionController::class,'add']);

// Update
Route::post('update',[QuestionController::class,'update']);

// Delete
Route::post('delete',[QuestionController::class,'delete']);

// Testni boshlash
Route::any('startquiz',[QuestionController::class,'startquiz']);

// Testni jo`natish
Route::any('submitans',[QuestionController::class,'submitans']);

Route::get('import',[QuestionController::class,'import']);
Route::post('ok',[QuestionController::class,'ok']);

// Random qilish
Route::get('rand',[QuestionController::class,'random'])->name('random');

// register
Route::view('boshlash','boshlash');
Route::post('true',[QuestionController::class,'register'])->name('register');
