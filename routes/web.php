<?php

use App\Http\Controllers\Course;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NewStudentsController;
use App\Http\Controllers\NewTeacherController;
use App\Http\Controllers\Posts;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TaskController;
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

Route::get(
    'ajax/groups',
    [RatingController::class, 'showGroup']
)->name('showGroups');

Route::get(
    'ajax/group_table',
    [RatingController::class, 'showGroupTable']
)->name('showGroupTable');


Route::get('/',
    [Posts::class, 'index']
)->name('main');

Route::post(
    '/post/add',
    [Posts::class, 'add']
)->middleware(['auth'])->name('addPost');

Route::get(
    '/main',
    [Course::class, 'index']
)->name('courses');

Route::get(
    'course/add',
    [CourseController::class, 'addForm']
)->middleware(['auth'])->name('add_course_view');

Route::post(
    'course/add/submit',
    [CourseController::class, 'add']
)->middleware(['auth'])->name('add_course');

Route::get(
    '/course/{course_id}',
    [CourseController::class, 'index']
)->middleware(['auth'])->name('currentCourse');

Route::get(
    '/task/{course_id}/{task_id}',
    [TaskController::class, 'index']
)->middleware(['auth'])->name('task');

Route::post(
    '/task/add/homework/{course_id}/{task_id}',
    [TaskController::class, 'addHomework']
)->middleware(['auth'])->name('addHomework');

Route::post(
    'task/rate/homework/',
    [TaskController::class, 'rateHomework']
)->middleware(['auth'])->name('rateHomework');

Route::post(
    '/task/add/{course_id}',
    [TaskController::class, 'add']
)->middleware(['auth'])->name('addTask');

Route::get(
    '/profile',
    [ProfileController::class, 'index']
)->middleware(['auth'])->name('profile');

Route::get(
    '/new_teacher',
    [NewTeacherController::class, 'index']
)->middleware(['auth'])->name('new_teacher');

Route::post(
    '/new_teacher/add',
    [NewTeacherController::class, 'add']
)->middleware(['auth'])->name('addTeacher');

Route::get(
    '/new_students',
    [NewStudentsController::class, 'index']
)->middleware(['auth'])->name('new_students');

Route::post(
    '/add_students',
        [NewStudentsController::class, 'add']
)->middleware(['auth'])->name('addStudents');

Route::get(
    '/groups_rating',
    [RatingController::class, 'groups']
)->middleware(['auth'])->name('groups_rating');

Route::get(
    '/rating',
    [RatingController::class, 'student']
)->middleware(['auth'])->name('studentRating');

Route::get(
    '/course_rating/{course_id}',
    [RatingController::class, 'course']
)->middleware(['auth'])->name('courseRating');

//Route::post(
//    '/users_export',
//    [\App\Exports\UserExport::class, 'export']
//)->middleware(['auth'])->name('addStudents');

require __DIR__.'/auth.php';
