<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    public static function get_user_role($user_id){
        $user = UserInfo::where('user_id', $user_id)->first();
        if ($user) return $user->type;
        else return 1;

    }

    public static function get_group_id($user_id){
        $user = UserInfo::where('user_id', $user_id)->first();
        if ($user->type == 1) return $user->group_id;
        else return 0;
    }

    public static function get($user_id){
//        dd(UserInfo::where('user_id', $user_id)->first());
        return UserInfo::where('user_id', $user_id)->first();
    }
}
