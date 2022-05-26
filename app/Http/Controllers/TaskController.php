<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
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
        $params['access'] = UserInfo::get_user_role(Auth::user()->id);
        $params['task'] = Task::where('course_id', $course_id)->where('id', $task_id)->first();
        return view('task', $params);
    }
}
