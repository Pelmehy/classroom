<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

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
        $params['task'] = Task::where('course_id', $course_id)->where('id', $task_id)->first();
        return view('task', $params);
    }
}
