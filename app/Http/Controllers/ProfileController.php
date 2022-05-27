<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInfo;

class ProfileController extends Controller
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
        $user_id = Auth::user()->id;

        $params['access'] = UserInfo::get_user_role(Auth::user()->id);
        $params['user'] = Auth::user();
        $params['user_info'] = UserInfo::where('user_id', $user_id)->first();
        return view('profile', $params);
    }
}
