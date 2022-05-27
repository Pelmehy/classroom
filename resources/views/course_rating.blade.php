@extends('layouts.app')

@section('title-block')
    студенти
@endsection

@section('content')
    <div class="table" id="table">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Завдання</th>
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
                    <td>{{$task->rating}}</td>
                    <td>{{$task->type}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    </div>

@endsection
