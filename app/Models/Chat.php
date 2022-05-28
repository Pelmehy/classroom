<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Chat extends Model
{
    use HasFactory;

    public static function get_by_task($task_id){
        return Chat::where('task_id', $task_id)->get();
    }

    public static function prepare_chat($task_id){
        $messages = Chat::get_by_task($task_id);
        $prepared_messages = [];

        $size = sizeof($messages);

//        dd($size);

        for ($i = 0; $i < $size; $i++){
            $step = 0;

            $messages[$i]->user_name = UserInfo::get($messages[$i]->user_id)->fullName;

            if ($i < $size - 1) {
                $date_start = Carbon::createFromTimestamp($messages[$i]->created_at);
                $date_end = Carbon::createFromTimestamp($messages[$i + 1]->created_at);
                if ($messages[$i]->user_id == $messages[$i + 1]->user_id && $date_end->diffInMinutes($date_start) < 2){

                    $messages[$i]->message2 = $messages[$i + 1]->message;
                    $step = 1;
                }
            }
            $prepared_messages[$i] = $messages[$i];
            $i += $step;
        }
//        dd($prepared_messages);
        return $prepared_messages;
    }

}
