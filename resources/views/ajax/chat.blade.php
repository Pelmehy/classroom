
{{--        <div id="chatbox-area">--}}

    <div class="content">
        @foreach($messages as $message)
            @if($message->user_id == Auth::user()->id)
                <div class="chat-message-group writer-user">
                    <div class="chat-messages">
                        <div class="message">{{$message->message}}</div>
                        @if($message->message2)
                            <div class="message">{{$message->message2}}</div>
                        @endif
                        <div class="from">{{$message->created_at}}</div>
                    </div>
                </div>
            @else
                <div class="chat-message-group">
                    <div class="chat-thumb">
                        <figure class="image is-32x32">
                            <img class="is-32x32" src="{{asset('storage').'/default/a4.ico'}}">
                        </figure>
                    </div>
                    <div class="chat-messages">
                        <div class="from">{{$message->user_name}}</div>
                        <div class="from">{{$message->created_at}}</div>
                        <div class="message">{{$message->message}}</div>
                        @if($message->message2)
                            <div class="message">{{$message->message2}}</div>
                        @endif
                    </div>

                </div>
            @endif
        @endforeach
    </div>

{{--</div>--}}
