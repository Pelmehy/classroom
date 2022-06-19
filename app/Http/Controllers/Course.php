<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use App\Models\Cource;
use Illuminate\Support\Facades\Auth;

class Course extends Controller
{
    public $params = [];
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (Auth::user()) {
            $user_info = UserInfo::get(Auth::user()->id);
            $courses = null;
            switch ($user_info->type){
                case 1:
                    $courses = Cource::get_by_group($user_info->group_id);
                    break;
                case 2:
                    $courses = Cource::get_by_teacher($user_info->id);
                    break;
                case 3:
                    $courses = Cource::all();
                    break;
            }
            $params['courses'] = $courses;
            $params['access'] = UserInfo::get_user_role(Auth::user()->id);
        }
        return view('main', $params);
    }

    public function addForm(){
        return view('new_course');
    }
}
