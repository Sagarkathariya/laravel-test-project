<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiStudentController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/students', [ApiStudentController::class, 'index'])->name('apistudents.index');
Route::get('/students/{student}', [ApiStudentController::class, 'show'])->name('apistudents.show');
// Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::get('/user', function(){
    p('working');
});

Route::post('/students', [ApiStudentController::class, 'store'])->name('apistudents.store');
Route::put('/students/{student}', [ApiStudentController::class, 'update'])->name('apistudents.update');
Route::delete('/students/{student}', [ApiStudentController::class, 'destroy'])->name('apistudents.destroy');
