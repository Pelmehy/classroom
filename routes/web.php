<?php

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

Route::get('/',
    [\App\Http\Controllers\Course::class, 'index']
)->name('main');

Route::get(
    '/posts',
    [\App\Http\Controllers\Posts::class, 'index']
)->name('posts');

Route::get(
    'course/add',
    [\App\Http\Controllers\CourseController::class, 'addForm']
)->middleware(['auth'])->name('add_course_view');

Route::post(
    'course/add/submit',
    [\App\Http\Controllers\CourseController::class, 'add']
)->middleware(['auth'])->name('add_course');

Route::get(
    '/course/{course_id}',
    [\App\Http\Controllers\CourseController::class, 'index']
)->middleware(['auth'])->name('currentCourse');

Route::get(
    '/task/{course_id}/{task_id}',
    [\App\Http\Controllers\TaskController::class, 'index']
)->middleware(['auth'])->name('task');

Route::get(
    '/profile',
    [\App\Http\Controllers\ProfileController::class, 'index']
)->middleware(['auth'])->name('profile');

Route::get(
    '/new_teacher',
    [\App\Http\Controllers\NewTeacherController::class, 'index']
)->middleware(['auth'])->name('new_teacher');

Route::get(
    '/new_students',
    [\App\Http\Controllers\NewStudentsController::class, 'index']
)->middleware(['auth'])->name('new_students');

Route::post(
    '/add_students',
        [\App\Http\Controllers\NewStudentsController::class, 'add']
)->middleware(['auth'])->name('addStudents');

//Route::post(
//    '/users_export',
//    [\App\Exports\UserExport::class, 'export']
//)->middleware(['auth'])->name('addStudents');

require __DIR__.'/auth.php';
