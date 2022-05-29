@extends('layouts.app')

@section('title-block')
    Дошка оголошень
@endsection

@section('content')
    <div class="row">
        @if($access > 2)
            @include('inc.add_post')
        @else
            @include('inc.calendar')
        @endif

        <div class="col-md-7 col-lg-8">
            <div class="board">
                @foreach($posts as $post)
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="post col-auto d-none d-lg-block rounded">
                            <img src="{{asset('storage').$post->img}}" alt="">
{{--                            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>--}}

                        </div>
                        <div class="col p-4 d-flex flex-column position-static rounded">
                            <h3 class="mb-0">{{$post->name}}</h3>
                            <div class="mb-1 text-muted">{{$post->created_at}}</div>
                            <p class="card-text mb-auto">{{$post->description}}</p>

                            @if($access == 3)
                                <button type="button" class="btn btn-outline-danger">Видалити</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @if($access == 1)
            <script>
                $(document).ready(function () {
                    renderCalendar();
                })
            </script>
        @endif
@endsection
