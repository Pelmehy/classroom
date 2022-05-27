<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Validation;
use App\Models\Cource;
use App\Models\Faculty;
use App\Models\Group;
use App\Models\StudentRating;
use App\Models\Task;
use App\Models\UserInfo;
use App\Models\UserTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function groups(){
        Validation::isTeacher();

        $faculties = Faculty::all();
        $groups = Group::all();

        $params['faculties'] = $faculties;
        $params['groups'] = $groups;
        $params['access'] = UserInfo::get_user_role(Auth::user()->id);
        return view('group_rating', $params);
    }

    public function showGroup(Request $request){
        if ($request->ajax()){
            return Group::get_by_faculty($request->faculty_id);
        }

        return false;
    }

    public function showGroupTable(Request $request){
        if (!$request->ajax()){
            return false;
        }

        $faculty_id = $request->faculty_id;
        $group_id = $request->group_id;

        $courses = Cource::where('group_id', $group_id)->get();

        foreach ($courses as $course){
            $course->faculty = Faculty::get_by_id($faculty_id)->name;
            $course->group = Group::get_by_id($group_id)->tag;
            $course->teacher = UserInfo::get($course->teacher_id)->fullName;
        }

        $params['courses'] = $courses;

        return view('ajax.group_table', $params)->render();
    }

    public function student(){

        $student = UserInfo::get(Auth::user()->id);

        $courses = Cource::where('group_id', $student->group_id)->get();

        foreach ($courses as $course){
            $course->teacher = UserInfo::get($course->teacher_id)->fullName;
        }

        $params['courses'] = $courses;
        $params['access'] = $student->type;
        return view('student_rating', $params);
    }

    public function course($course_id){
        $student = UserInfo::get(Auth::user()->id);

        $tasks = Task::get_by_course($course_id);

        foreach ($tasks as $task){
            $student_task_rate = StudentRating::get_by_task($student->user_id, $task->id);
            $student_task_norate = UserTask::get_current_user_task($student->user_id, $task->id);

            if ($student_task_rate){
                $task->rating = $student_task_rate->rating;
                $task->type = 'Оцінено';
            }
            elseif ($student_task_norate){
                $task->type = 'Здано';
            }
            else {
                $task->rating = ' ';
                $task->type = 'Не здано';
            }
        }

        $params['course_id'] = $course_id;
        $params['tasks'] = $tasks;
        $params['access'] = $student->type;
        return view('course_rating', $params);
    }
}
