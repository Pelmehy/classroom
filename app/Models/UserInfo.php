<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    public function get_user_role($user_id){
        return UserInfo::where('user_id', $user_id)->first()->type;
    }

    public function get($user_id){
        return UserInfo::where('user_id', $user_id)->first();
    }
}
