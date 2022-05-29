@extends('layouts.app')

@section('title-block')
    Головна
@endsection

@section('content')
<main>
    <div class="">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($courses as $course)
                <div class="col">
                    <div class="course card shadow-sm mb-5">
{{--                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Приклад курса" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Приклад курса</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Приклад курса</text></svg>--}}

                        @if ($course->img == ' ')
                            <img src="{{asset('storage').'/default/default_background.jpg'}}" alt="">
{{--                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Приклад курса" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Приклад курса</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Приклад курса</text></svg>--}}
                        @else
                            <img src="{{asset('storage').$course->img}}" alt="">
                        @endif

                        <div class="card-body">
                            <h4>{{$course->name}}</h4>
                            <p class="card-text">
                                {{$course->description}}
                            </p>
                            <div class="d-flex justify-content-between align-items-center self-end">
                                <a href="{{route('currentCourse', 1)}}" class="btn btn-outline-secondary">відкрити курс</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</main>
@endsection
