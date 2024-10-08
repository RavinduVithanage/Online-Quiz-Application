<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('index');


Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/dashboard',[AdminController::class,'showData'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create-question',[QuestionController::class,'createQuestion'])->name('create.question');
    Route::post('/add-question',[QuestionController::class ,'addQuestion'])->name('add.question');
    Route::get('/edit-question/{questionId}',[QuestionController::class,'editQuestion'])->name('edit.question');
    Route::put('/update-question/{questionId}',[QuestionController::class,'updateQuestion'])->name('update.question');

});

require __DIR__.'/auth.php';
