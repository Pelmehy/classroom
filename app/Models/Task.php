<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public static function get_by_course($course_id){
        return Task::where('course_id', $course_id)->get();
    }

    public static function get_dates_by_group_id($group_id){
        $courses = Cource::select('id')->where('group_id', $group_id)->get();
        return Task::select('end_date')->whereIn('course_id', $courses)->get();
    }
}
