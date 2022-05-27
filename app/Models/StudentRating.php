<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRating extends Model
{
    use HasFactory;

    public static function get_by_task($student_id, $task_id){
        return StudentRating::where('student_id', $student_id)->where('task_id', $task_id)->first();
    }
}
