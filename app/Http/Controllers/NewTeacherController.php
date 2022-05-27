<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Http\Middleware\Validation;
use App\Models\Faculty;
use App\Models\Group;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

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

    public function add(Request $request){
        Validation::isTeacher();

        $faculty = $request->input('faculty');
        $faculty_id = 0;

        if(Faculty::where('name', $faculty)->exists()) $faculty_id = Faculty::where('name', $faculty)->first()->id;
        else{
            $newFaculty = new Faculty();
            $newFaculty->name = $faculty;
            $newFaculty->deanName = 'ff';
            $newFaculty->save();
            $faculty_id = $newFaculty->id;
        }

        $name = $request->input('lastName').' '.$request->input('firstName').' '.$request->input('middleName');
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('phone');

        if(User::where('email', $email)->exists()){
            $user = User::where('email', $email)->first();
            $user->name = $name;
            $user->password = Hash::make($password);
            $user->save();

            $user->password = $password;
            $temp[] = $user;

            $user_info = UserInfo::where('user_id', $user->id)->first();
            $user_info->faculty_id = $faculty_id;
            $user_info->group_id = 0;
            $user_info->fullName = $name;
            $user_info->phone = $phone;
            $user_info->type = Config::get('constants.USER_TYPE_TEACHER');
            $user_info->first_login = 1;
            $user_info->save();
        }
        else{
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            $user->password = $password;
            $temp[] = $user;

            $user_info = new UserInfo();
            $user_info->user_id = $user->id;
            $user_info->faculty_id = $faculty_id;
            $user_info->group_id = 0;
            $user_info->fullName = $name;
            $user_info->phone = $phone;
            $user_info->type = Config::get('constants.USER_TYPE_TEACHER');
            $user_info->first_login = 1;
            $user_info->save();
        }

        return Excel::download(new UserExport($temp), 'users.xlsx');
    }
}
