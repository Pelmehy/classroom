<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Validation;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewTeacherController extends Controller
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

    public function index()
    {
        Validation::isAdmin();

        $params['access'] = UserInfo::get_user_role(Auth::user()->id);
        return view('new_teacher', $params);
    }
}
