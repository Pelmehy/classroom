<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cource extends Model
{
    use HasFactory;

    public static function get_by_teacher($id){
        return Cource::where('teacher_id', $id)->get();
    }

    public static function get_by_group($id){
        return Cource::where('group_id', $id)->get();
    }
}
