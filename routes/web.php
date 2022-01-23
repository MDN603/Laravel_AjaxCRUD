<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/students', [StudentController::class , 'index']);

Route::post('/students', [StudentController::class , 'afterSubmit'])->name('student.add');

Route::get('/students/{id}', [StudentController::class , 'getStudentById'])->name('student.update');

Route::put('/student', [StudentController::class , 'updateStudent'])->name('student.update');

Route::delete('/students/{id}', [StudentController::class , 'deleteStudent']);

Route::delete('/selected-students', [StudentController::class , 'deleteSelectedStudents'])->name('student.deleteSelected');
