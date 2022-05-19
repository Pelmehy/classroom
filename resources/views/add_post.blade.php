@extends('layouts.app')

@section('title-block')
    Дошка оголошень
@endsection

@section('content')
    <div class="row g-5">

        {{--        calendar--}}
        <div class="col-md-5 col-lg-4 order-md-last">
            <div class="add_post row">
                <div class="post-img text-center">
                    <div class="input__wrapper">
                        <input name="file" type="file" name="file" id="input__file" class="input input__file" multiple>
                        <label for="input__file" class="input__file-button text-center">
                            <img class="input__file-icon" src="{{asset('icons/img.ico')}}" alt="Выбрать файл" width="25">
                        </label>
                    </div>
                </div>
                <div class="post-description text-center">
                    <label for="lastName" class="form-label">Назва</label>
                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                    <label for="lastName" class="form-label">Опис</label>
                    <textarea class="form-control w-100" aria-label="With textarea"></textarea>
                    <div class="d-flex w-100 h-100 p-3 mx-auto flex-column">
                        <button class="w-100 btn btn-dark btn-lg" type="submit">Додати</button>
                    </div>
                </div>
            </div>
        </div>
        {{--        add post--}}
        <div class="col-md-7 col-lg-8">
            <div class="board">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-none d-lg-block rounded">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                    </div>
                    <div class="col p-4 d-flex flex-column position-static rounded">
                        <h3 class="mb-0">Відміна навчання</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">Значимость этих проблем настолько очевидна, что укрепление и развитие структуры способствует подготовки и реализации систем массового участия. </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="button" class="btn btn-sm btn-outline-danger">Видалити</button>
                            <small class="text-muted">9 mins</small>
                        </div>
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
