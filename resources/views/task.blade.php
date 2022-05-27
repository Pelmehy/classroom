@extends('layouts.app')

@section('title-block')
    Курс
@endsection

@section('content')

    <div class="main-task pb-3 border">
        <div class="d-grid gap-2" style="grid-template-columns: 0fr 2fr;">
            <div class="file border rounded-3">
                @if($task->type == 0)
                    <img src="{{asset('storage')}}./default/text.ico" alt="">
                @else
                    <a type="file" href="{{asset('storage').$task->file}}"><img src="{{asset('storage')}}/default/file.ico" alt=""></a>
                @endif
            </div>
            <div class="theme rounded-3">
                <h2>Тема завдання: {{$task->name}}</h2>
            </div>
        </div>
        <div class="description border-top rounded-3">
            <p class="lead">Опис завдання:
                {{$task->description}}
            </p>
        </div>
    </div>

    <div class="task-elems row ">
        <div class="col-md-6">
            <div id="h-100 p-5 bg-light border rounded-3 ">
                    <div class="chatBox" id="chatBox">
                        <div class="card">
                            <div id="chatbox-area">
                                <div class="card-content chat-content">
                                    <div class="content">
                                        <div class="chat-message-group">
                                            <div class="chat-thumb">
                                                <figure class="image is-32x32">
                                                    <img src="https://k0.okccdn.com/php/load_okc_image.php/images/32x0/971x939/0/10846088441021659030.webp?v=2">
                                                </figure>
                                            </div>
                                            <div class="chat-messages">
                                                <div class="message">Olá meu nome é Camila</div>
                                                <div class="from">Hoje 04:55</div>
                                            </div>
                                        </div>
                                        <div class="chat-message-group writer-user">
                                            <div class="chat-messages">
                                                <div class="message">Olá meu nome é Marinho</div>
                                                <div class="from">Hoje 04:55</div>
                                            </div>
                                        </div>
                                        <div class="chat-message-group">
                                            <div class="chat-thumb">
                                                <figure class="image is-32x32">
                                                    <img src="https://k0.okccdn.com/php/load_okc_image.php/images/32x0/971x939/0/10846088441021659030.webp?v=2">
                                                </figure>
                                            </div>
                                            <div class="chat-messages">
                                                <div class="message">Olá meu nome é Marinho</div>
                                                <div class="message">Caro marinho</div>
                                                <div class="from">Hoje 04:55</div>
                                            </div>

                                        </div>
                                        <div class="chat-message-group writer-user">
                                            <div class="chat-messages">
                                                <div class="message">Olá meu nome é Marinho</div>
                                                <div class="from">Hoje 04:55</div>
                                            </div>
                                        </div>
                                        <div class="chat-message-group writer-user">
                                            <div class="chat-messages">
                                                <div class="message">Olá meu nome é Marinho</div>
                                                <div class="from">Hoje 04:55</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <footer class="" id="chatBox-textbox">
                                    <form class="card p-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Повідомлення">
                                            <button type="submit" class="btn btn-outline-success">Відправити</button>
                                        </div>
                                    </form>
                                </footer>
                            </div>
                        </div>
                    </div>
                    <div class="emojiBox" style="display: none">
                        <div class="box">

                        </div>
                    </div>

                </div>
        </div>
        <div class="col-md-6">
            @if($access == 1)
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Мої завдання</h2>
                    <h2>Срок здачі: {{$task->end_date}}</h2>
                    <br><br>
                    <form action="{{route('addHomework')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="course_id" value="{{$task->course_id}}" style="display: none">
                        <input type="text" name="task_id" value="{{$task->id}}" style="display: none">

                        <div class="form-group border rounded">
                            <label for="exampleFormControlFile1">Додати файл</label>
                            <br>
                            <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        @if($error)
                            <div class="alert alert-danger" role="alert">
                                {{$error}}
                            </div>
                        @endif
                        <br>

                        <div class="text-center">
                            <button class="btn btn-outline-success" type="submit">Оновити</button>
                        </div>
                    </form>
                </div>
            @else
                <div class="h-100 p-5 bg-light border rounded-3" style="overflow: auto">

                </div>
            @endif
        </div>
    </div>

    <div class="main-task pb-3 border">
        <div class="d-grid gap-2" style="grid-template-columns: 2fr 2fr;">


        </div>
    </div>
@endsection
