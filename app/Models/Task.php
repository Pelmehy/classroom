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

    public static function get_student_tasks($student_id, $course_id){
        $student = UserInfo::get($student_id);

        $tasks = Task::get_by_course($course_id);

        foreach ($tasks as $task){
            $student_task_rate = StudentRating::get_by_task($student->user_id, $task->id);
            $student_task_norate = UserTask::get_current_user_task($student->user_id, $task->id);

            if ($student_task_rate){
                $task->rating = $student_task_rate->rating;
                $task->type = 'Оцінено';
            }
            elseif ($student_task_norate){
                $task->type = 'Здано';
            }
            else {
                $task->rating = ' ';
                $task->type = 'Не здано';
            }
        }

        return $tasks;
    }
}
