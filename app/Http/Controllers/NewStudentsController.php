<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class NewStudentsController extends Controller
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
        return view('new_student');
    }

    public function add(Request $request){

        $count = $request->input('val');
        $users = [];

        for ($i = 0; $i < $count; $i++){
            $name = $request->input('lastName-'.$i).' '.$request->input('firstName-'.$i).' '.$request->input('middleName-'.$i);
            $email = $request->input('email');
            $password = $request->input('password-'.$i);
            $phone = $request->input('password-phone'.$i);
//            dd($name);
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
            dd($user);
            $user_info = new UserInfo();

        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
