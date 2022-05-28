@extends('layouts.app')

@section('title-block')
    Курс
@endsection

@section('content')

    <div class="row g-5">
        @if($access >= 2)
                @include('inc.add_task')
        @else
            @include('inc.calendar')
        @endif
        <div class="col-md-7 col-lg-8">
            @foreach($tasks as $task)
                <a href="{{route('task', [$course_id, $task->id])}}">
                    <div class="tasks d-flex text-muted pt-3">
                        <div class="ico flex-shrink-0 me-2">
                            @if($task->type == 0)
                                <img src="{{asset('storage')}}./default/text.ico" alt="">
                            @else
                                <img src="{{asset('storage')}}./default/file.ico" alt="">
                            @endif
                        </div>
                        <p class="pb-3 mb-0 small">
                            {{$task->name}}
                        </p>
                    </div>
                </a>
            @endforeach

            <div class="tasks d-flex text-muted pt-3">
                <div class="ico flex-shrink-0 me-2"></div>
                <p class="pb-3 mb-0 small">
                    Some representative placeholder content, with some information about this user. Imagine this being some sort of status update, perhaps?
                </p>
            </div>
            <div class="tasks d-flex text-muted pt-3">
                <div class="ico flex-shrink-0 me-2"></div>
                <p class="pb-3 mb-0 small">
                    Some representative placeholder content, with some information about this user. Imagine this being some sort of status update, perhaps?
                </p>
            </div>

        </div>
    </div>

    @if($access == 1)
        <script>

        </script>
    @endif
@endsection
