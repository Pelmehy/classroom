<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public static function getDates(Request $request){
        if (!$request->ajax()){
            return false;
        }

//        return $request;

        $start_date = new Carbon((int)$request->start_date);
        $end_date = new Carbon((int)$request->end_date);

        $dates = Task::select('end_date')->where('course_id', $request->course_id)
            ->whereBetween('end_date', [$start_date->format('y-m-d'), $end_date->format('y-m-d')])
            ->get();
//        return [$start_date->format('y-m-d'), $end_date->format('y-m-d')];

        return $dates;
    }

    public function getTasksForCourse(Request $request){
        if (!$request->ajax()){
            return false;
        }

        $params['tasks'] = Task::where('course_id', $request->course_id)
            ->where('end_date', $request->end_date)
            ->get();

        return view('ajax.end_tasks', $params)->render();
    }
}
