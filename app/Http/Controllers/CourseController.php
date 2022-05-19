<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class CourseController extends Controller
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

    public function index($course_id)
    {
        $params['course_id'] = $course_id;
        $params['tasks'] = Task::where('course_id', $course_id)->orderBy('end_date')->get();
        return view('course', $params);
    }
}
