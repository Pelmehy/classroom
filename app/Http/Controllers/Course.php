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
        $params['courses'] = Cource::all();
        if (Auth::user()) {
            $params['access'] = UserInfo::get_user_role(Auth::user()->id);
        }
        return view('main', $params);
    }

    public function addForm(){
        return view('new_course');
    }
}
