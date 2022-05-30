<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Validation;
use App\Models\Cource;
use App\Models\Faculty;
use App\Models\Group;
use App\Models\Student;
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

    public function task($course_id, $group_id){
        Validation::isTeacher();

        $params['students'] = UserInfo::where('group_id', $group_id)->get();
        $params['course_id'] = $course_id;
        $params['access'] = UserInfo::get_user_role(Auth::user()->id);
        return view('task_rating', $params);
    }

    public function showTaskTable(Request $request){
        if (!$request->ajax()){
            return false;
        }

        $params['tasks'] = Task::get_student_tasks($request->student_id, $request->course_id);
        $params['course_id'] = $request->course_id;
        return view('ajax.task_table', $params);
    }

    public function student(){

        $student = UserInfo::get(Auth::user()->id);

        $courses = Cource::where('group_id', $student->group_id)->get();

        foreach ($courses as $course){
            $course->teacher = UserInfo::get($course->teacher_id)->fullName;
            $course->sum = StudentRating::get_student_sum($student->id, $course->id);
        }

        $params['courses'] = $courses;
        $params['access'] = $student->type;
        return view('student_rating', $params);
    }

    public function course($course_id){
        $user_id = Auth::user()->id;

        $params['course_id'] = $course_id;
        $params['tasks'] = Task::get_student_tasks($user_id, $course_id);
        $params['access'] = UserInfo::get_user_role($user_id);
        return view('course_rating', $params);
    }
}
