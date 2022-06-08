<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;

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
        $user_info = UserInfo::where('user_id', $user_id)->first();
        switch ($user_info->type){
            case 1:
                $user_info->type = 'студент';
                $user_info->group = Group::get_by_id($user_info->group_id);
                break;
            case 2:
                $user_info->type = 'викладач';
                break;
            case 3:
                $user_info->type = 'адмін';
                break;
        }


        $params['access'] = UserInfo::get_user_role(Auth::user()->id);
        $params['user'] = Auth::user();
        $params['user_info'] = $user_info;
        $params['error'] = null;
        return view('profile', $params);
    }

    public function update(Request $request){
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $user_info = UserInfo::where('id', $user_id)->first();

        $file = $request->file('file');
        if ($file) {
            $path = $file->store('user-'.Auth::user()->id, 'storage');
            $path = '/storage/'.$path;
            $user_info->img = $path;
        }

        $phone = $request->input('phone');
        if ($phone){
            $user_info->phone = $phone;
        }

        $email = $request->input('email');
        if ($email) $user->email = $email;

        $password1 = $request->input('password1');
        $password2 = $request->input('password2');

//        dd($password1, $password2, $password1 == $password2);

        if ($password1) {
            if ($password1 == $password2) $user->password = Hash::make($password1);
            else {
                $params['access'] = UserInfo::get_user_role(Auth::user()->id);
                $params['user'] = Auth::user();
                $params['user_info'] = UserInfo::where('user_id', $user_id)->first();
                $params['error'] = 'Паролі не співпадають';
                return view('profile', $params);
            }
        }

        $user->save();
        $user_info->save();
        return redirect()->route('main');
    }
}
