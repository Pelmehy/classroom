<?php

namespace App\Http\Controllers;

use App\Models\Cource;
use App\Models\Task;
use App\Models\UserInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getAllDates(Request $request){
        if (!$request->ajax()){
            return false;
        }

//        return $request;

        $start_date = new Carbon((int)$request->start_date);
        $end_date = new Carbon((int)$request->end_date);
        $group_id = UserInfo::get_group_id(Auth::user()->id);
        $courses = Cource::select('id')->where('group_id', $group_id);

        $dates = Task::select('end_date')->whereIn('course_id', $courses)
            ->whereBetween('end_date', [$start_date->format('y-m-d'), $end_date->format('y-m-d')])
            ->get();
//        return [$start_date->format('y-m-d'), $end_date->format('y-m-d')];

        return $dates;
    }

    public function getAllTasks(Request $request){
        if (!$request->ajax()){
            return false;
        }
        $group_id = UserInfo::get_group_id(Auth::user()->id);
        $courses = Cource::select('id')->where('group_id', $group_id)->get();
        $params['tasks'] = Task::whereIn('course_id', $courses)->where('end_date', $request->end_date)->get();

        return view('ajax.end_tasks', $params)->render();
    }
}
