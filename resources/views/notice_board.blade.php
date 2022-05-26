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
                        <div class="col-auto d-none d-lg-block rounded">
                            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                        </div>
                        <div class="col p-4 d-flex flex-column position-static rounded">
                            <h3 class="mb-0">{{$post->name}}</h3>
                            <div class="mb-1 text-muted">{{$post->created_at}}</div>
                            <p class="card-text mb-auto">{{$post->description}}</p>
                        </div>
                    </div>
                @endforeach
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-none d-lg-block rounded">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                    </div>
                    <div class="col p-4 d-flex flex-column position-static rounded">
                        <h3 class="mb-0">Відміна навчання</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">Значимость этих проблем настолько очевидна, что укрепление и развитие структуры способствует подготовки и реализации систем массового участия. </p>
                    </div>
                </div>
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-none d-lg-block rounded">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                    </div>
                    <div class="col p-4 d-flex flex-column position-static rounded">
                        <h3 class="mb-0">Відміна навчання</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">Значимость этих проблем настолько очевидна, что укрепление и развитие структуры способствует подготовки и реализации систем массового участия. </p>
                    </div>
                </div>
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-none d-lg-block rounded">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                    </div>
                    <div class="col p-4 d-flex flex-column position-static rounded">
                        <h3 class="mb-0">Відміна навчання</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">Значимость этих проблем настолько очевидна, что укрепление и развитие структуры способствует подготовки и реализации систем массового участия. </p>
                    </div>
                </div>
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-none d-lg-block rounded">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                    </div>
                    <div class="col p-4 d-flex flex-column position-static rounded">
                        <h3 class="mb-0">Відміна навчання</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">Значимость этих проблем настолько очевидна, что укрепление и развитие структуры способствует подготовки и реализации систем массового участия. </p>
                    </div>
                </div>
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-none d-lg-block rounded">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                    </div>
                    <div class="col p-4 d-flex flex-column position-static rounded">
                        <h3 class="mb-0">Відміна навчання</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">Значимость этих проблем настолько очевидна, что укрепление и развитие структуры способствует подготовки и реализации систем массового участия. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
