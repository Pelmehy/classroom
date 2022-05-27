<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Validation;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Faculty;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Config;

use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

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
        Validation::isTeacher();

        $params['access'] = UserInfo::get_user_role(Auth::user()->id);
        return view('new_student', $params);
    }

    public function add(Request $request){
        Validation::isTeacher();

        $count = $request->input('val');
        $temp = [];

        $faculty = $request->input('faculty');
        $faculty_id = 0;
        $group = $request->input('group');
        $group_id = 0;

        if(Faculty::where('name', $faculty)->exists()) $faculty_id = Faculty::where('name', $faculty)->first()->id;
        else{
            $newFaculty = new Faculty();
            $newFaculty->name = $faculty;
            $newFaculty->deanName = 'ff';
            $newFaculty->save();
            $faculty_id = $newFaculty->id;
        }

        if (Group::where('tag', $group)->exists()) $group_id = Group::where('tag', $group)->first()->id;
        else{
            $newGroup = new Group();
            $newGroup->tag = $group;
            $newGroup->faculty_id = $faculty_id;
            $newGroup->save();
        }

        for ($i = 0; $i < $count; $i++){
            $name = $request->input('lastName-'.$i).' '.$request->input('firstName-'.$i).' '.$request->input('middleName-'.$i);
            $email = $request->input('email-'.$i);
            $password = $request->input('password-'.$i);
            $phone = $request->input('phone-'.$i);

            if(User::where('email', $email)->exists()){
                $user = User::where('email', $email)->first();
                $user->name = $name;
                $user->password = Hash::make($password);
                $user->save();

                $user->password = $password;
                $temp[$i] = $user;

                $user_info = UserInfo::where('user_id', $user->id)->first();
                $user_info->faculty_id = $faculty_id;
                $user_info->group_id = $group_id;
                $user_info->fullName = $name;
                $user_info->phone = $phone;
                $user_info->type = Config::get('constants.USER_TYPE_STUDENT');
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
                $temp[$i] = $user;

//            dd($user);
                $user_info = new UserInfo();
                $user_info->user_id = $user->id;
                $user_info->faculty_id = $faculty_id;
                $user_info->group_id = $group_id;
                $user_info->fullName = $name;
                $user_info->phone = $phone;
                $user_info->type = Config::get('constants.USER_TYPE_STUDENT');
                $user_info->first_login = 1;
                $user_info->save();

            }

        }
//        dd($temp);
        return Excel::download(new UserExport($temp), 'users.xlsx');
    }
}
