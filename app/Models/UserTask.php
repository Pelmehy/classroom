<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    use HasFactory;

    public function get_current_user_task($student_id, $task_id){
        return UserTask::where('task_id', $task_id)->where('student_id', $student_id)->first();
    }

    public function get_homeworks($task_id){
        $completed = StudentRating::select('id')->get();
        $tasks = UserTask::where('task_id', $task_id)->whereNotIn('id', $completed)->get();

        foreach ($tasks as $task){
            $task->user = UserInfo::get($task->student_id);
            $task->user->group = Group::get_tag($task->user->group_id);
        }

        return $tasks;
    }
}
