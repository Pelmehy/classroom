<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Validation;
use App\Models\UserInfo;
use App\Models\UserTask;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index($course_id, $task_id)
    {
        $params['course_id'] = $course_id;
        $params['task_id'] = $task_id;
        $params['access'] = UserInfo::get_user_role(Auth::user()->id);
        $params['task'] = Task::where('course_id', $course_id)->where('id', $task_id)->first();
        $params['error'] = null;

        if (!Validation::isTeacher()){

        }
        return view('task', $params);
    }

    public function add($course_id, Request $request){
        Validation::isTeacher();

        $file = $request->file('img');

        $task = new Task();
        $task->course_id = $course_id;
        $task->name = $request->input('name');
        $task->description = $request->input('description');

        if ($file) $task->type = 1;
        else $task->type = 0;

        $task->file = ' ';
        $task->start_date = date('y-m-d', time());
        $task->end_date = $request->input('date');
        $task->save();

        $path = $task->id;

        if ($file){
            $file_name = $file->store('/course-'.$course_id.'/task'.$path, 'storage');
            $path = '/storage/'.$file_name;
            $task->file = $path;
            $task->save();
        }

        return redirect()->route('currentCourse', $course_id);
    }

    public function addHomework(Request $request){
        $file = $request->file('file');
        $course_id = $request->input('course_id');
        $task_id = $request->input('task_id');

        if (!$file){
            $params['access'] = UserInfo::get_user_role(Auth::user()->id);
            $params['task'] = Task::where('course_id', $course_id)->where('id', $task_id)->first();
            $params['error'] = 'Файл не додан';
            return view('task', $params);
        }

        $task = new UserTask();
        $task->course_id = $course_id;
        $task->task_id = $task_id;
        $task->user_id = Auth::user()->id;
        $task->file = ' ';

        $path = $task->id;

        if ($file){
            $file_name = $file->store('/tasks/user-'.Auth::user()->id.'/'.$path, 'storage');
            $path = '/storage/'.$file_name;
            $task->file = $path;
            $task->save();
        }

        return redirect()->route('');
    }
}
