@extends('layouts.app')

@section('title-block')
    студенти
@endsection

@section('content')
        <div class="table" id="table">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Курс</th>
                    <th>Всього балів</th>
                    <th>Викладач</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>
                            <a href="{{route('courseRating', $course->id)}}">
                                {{$course->name}}
                            </a>
                        </td>
                        <td>{{$course->sum}}</td>
                        <td>{{$course->teacher}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
