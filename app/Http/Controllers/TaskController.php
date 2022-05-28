<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Validation;
use App\Models\Chat;
use App\Models\StudentRating;
use App\Models\UserInfo;
use App\Models\UserTask;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        if (!Validation::isTeacher()){
            $user_task = UserTask::get_current_user_task(Auth::user()->id, $task_id);
            if($user_task){
                $params['user_task'] = $user_task;
            }
            else $params['user_task'] = null;
        }
        else{
            $params['user_tasks'] = UserTask::get_homeworks($task_id);
        }

        $params['course_id'] = $course_id;
        $params['task_id'] = $task_id;
        $params['access'] = UserInfo::get_user_role(Auth::user()->id);
        $params['task'] = Task::where('course_id', $course_id)->where('id', $task_id)->first();
        $params['error'] = null;
        $params['cur_user_id'] = Auth::user()->id;
        $params['messages'] = Chat::prepare_chat($task_id);
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
        $user_id = Auth::user()->id;
        $task = UserTask::where('student_id', $user_id)->where('task_id', $task_id)->first();

        if (!$file){
            $params['access'] = UserInfo::get_user_role(Auth::user()->id);
            $params['task'] = Task::where('course_id', $course_id)->where('id', $task_id)->first();
            $params['user_task'] = $task;
            $params['error'] = 'Файл не додан';
            return view('task', $params);
        }

//        dd($task);
        if(!$task) {
            $task = new UserTask();
            $task->course_id = $course_id;
            $task->task_id = $task_id;
            $task->student_id = $user_id;
            $task->file = ' ';
            $task->save();
        }
        else{
            $task->course_id = $course_id;
            $task->task_id = $task_id;
            $task->student_id = $user_id;

            Storage::disk('public')->delete($task->file);
        }

        $path = $task->id;

        $file_name = $file->store('/tasks/user-'.Auth::user()->id.'/'.$path, 'storage');
        $path = '/storage/'.$file_name;
        $task->file = $path;
        $task->save();


        return redirect()->route('task', [$course_id, $task_id]);
    }

    public function rateHomework(Request $request){
        Validation::isTeacher();

        $course_id = $request->input('course_id');
        $task_id = $request->input('task_id');

        $student_rating = new StudentRating();
        $student_rating->student_id = Auth::user()->id;
        $student_rating->course_id = $course_id;
        $student_rating->task_id = $task_id;
        $student_rating->rating = $request->input('rate');
        $student_rating->save();

        return redirect()->route('task', [$course_id, $task_id]);

    }
}
