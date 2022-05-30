<div class="chatBox" id="chatBox">
    <div class="card">
        <div>
            <div id="chatbox-area" class="card-content chat-content">
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
                                        @if($message->img === ' ')
                                            <img class="is-32x32" src="{{asset('storage'.'/default/a'.($message->user_id % 12 + 1).'.ico')}}" />
                                        @else
                                            <img class="is-32x32" src="{{asset('storage'.$message->img)}}" style="border-radius: 100%" />
                                        @endif
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
            </div>
            <footer class="" id="chatBox-textbox">
                <form class="card p-2">
                    <div class="input-group">
                        <input id="message" type="text" class="form-control" placeholder="Повідомлення">
                        <button type="button" id="submit" class="btn btn-outline-success">Відправити</button>
                    </div>
                </form>
            </footer>
        </div>
    </div>
</div>

<script>
    $(document).ready(function (){
        $('#submit').click(function (){
            let message = $('#message').val()
            console.log(message);

            $.ajax({
                url: "{{route('message')}}",
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    message: message,
                    user_id: {{Auth::user()->id}},
                    task_id: {{$task->id}},
                },
                success: (data) => {
                    // console.log(data)
                    $('#chatbox-area').html(data)
                    $('#message').val('')
                },
            })
        })
    })
</script>
