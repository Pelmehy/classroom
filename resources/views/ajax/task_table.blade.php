<table class="table table-striped">
    <thead>
    <tr>
        <th>Завдання</th>
        <th>Студент</th>
        <th>Оцінка</th>
        <th>Стан</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <td>
                <a href="{{route('task', [$course_id, $task->id])}}">
                    {{$task->name}}
                </a>
            </td>
            <td>{{$task->student_name}}</td>
            <td>{{$task->rating}}</td>
            <td>{{$task->type}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
