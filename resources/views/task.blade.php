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
{{--                @include('ajax.chat')--}}
                @include('inc.chat')
            </div>
        </div>
        <div class="col-md-6">
            @if($access == 1)
                <div class="h-100 p-5 bg-light border rounded-3">
                    @if($user_task)
                        <h2>
                            <a href="{{asset('storage').$user_task->file}}">Мої завдання</a>
                        </h2>
                    @endif
                    <h2>Срок здачі: {{$task->end_date}}</h2>
                    <br><br>
                    <form action="{{route('addHomework')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="course_id" value="{{$task->course_id}}" style="display: none">
                        <input type="text" name="task_id" value="{{$task->id}}" style="display: none">

                        <div class="form-group border rounded">
                            <label for="exampleFormControlFile1">Додати файл</label>
                            <br>
                            <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" required>
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
                <div class="overflow h-100 bg-light border rounded-3" style="">
                    @foreach($user_tasks as $user_task)
                        <div class="student_tasks w-100 d-flex text-muted pt-3">
                            <a href="{{asset('storage').$user_task->file}}">
                                <div class="ico flex-shrink-0 me-2">
                                    <img src="{{asset('storage')}}./default/file.ico" alt="">
                                </div>
                            </a>
                            <div class="row media-body w-100 pb-3 mb-0 small lh-125">
                                <div class="col justify-content-between align-items-center w-100">
                                    <strong class="text-gray-dark">{{$user_task->user->fullName}}</strong>
                                    <br>
                                    <span class="w-100">{{$user_task->updated_at}}</span>
                                </div>
                                    <form action="{{route('rateHomework')}}" class="col input-group mb-3" method="POST">
                                        @csrf

                                        <input type="hidden" name="course_id" value="{{$course_id}}">
                                        <input type="hidden" name="task_id" value="{{$task_id}}">
                                        <input type="hidden" name="student_id" value="{{$user_task->user->user_id}}">

                                        <input type="value" class="form-control" name="rate" placeholder="Оцінка" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit">Додати</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
