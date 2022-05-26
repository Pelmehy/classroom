<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Validation;
use App\Models\UserInfo;
use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\Cource;
use App\Models\GroupModel;

use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index($course_id)
    {
        $params['access'] = UserInfo::get_user_role(Auth::user()->id);
        $params['course_id'] = $course_id;
        $params['tasks'] = Task::where('course_id', $course_id)->orderBy('end_date')->get();
        return view('course', $params);
    }

    public function addForm(){
        Validation::is_teacher();

        $params['access'] = UserInfo::get_user_role(Auth::user()->id);
        $params['faculty'] = 1;
        return view('new_course', $params);
    }

    public function add(Request $request){
        Validation::is_teacher();

        $course = new Cource();
        $course->teacher_id = Auth::user()->id;
        $course->group_id = $request->input('group');
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->img = ' ';
        $course->save();

        $path = $course->id;

        if ($request->file('img')){
            $file_name = $request->file('img')->store('/'.$path, 'storage');
            $path = '/storage/'.$file_name;
            $course->img = $path;
            $course->save();
        }

        return redirect()->route('main');
    }
}
