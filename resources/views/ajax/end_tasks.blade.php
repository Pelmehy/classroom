<div class="schedule w-100 text-center">
    <h4 class="">Завдання</h4>
    <hr>
</div>
<div class="schedule w-100 col-8">
    @foreach($tasks as $task)
            <h5>
                <a href="{{route('task', [$task->course_id, $task->id])}}">
                    <b>Завдання:</b>
                </a>
                {{$task->name}}
            </h5>
    @endforeach
</div>
