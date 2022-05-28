<div class="schedule w-100 text-center">
    <h4 class="">Завдання</h4>
    <hr>
</div>
<div class="schedule w-100 col-8">
    @foreach($tasks as $task)
        <h5>{{$task->name}}</h5>
    @endforeach
</div>
