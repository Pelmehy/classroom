<?php

namespace App\Http\Controllers;

use App\Events\NewMessageAdded;
use App\Models\Chat;
use App\Models\UserInfo;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessage(Request $request){
        if (!$request->ajax()){
            return false;
        }

        $message = new Chat();
//        event(new NewMessageAdded($message));
        $message->user_id = $request->user_id;
        $message->task_id = $request->task_id;
        $message->message = $request->message;
        $message->save();

//        event(new NewMessageAdded($message));

        $params['messages'] = Chat::prepare_chat($request->task_id);
        return view('ajax.chat', $params)->render();
    }
}
