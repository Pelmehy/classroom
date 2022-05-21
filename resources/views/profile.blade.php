@extends('layouts.app')

@section('title-block')
    Профіль
@endsection

@section('content')
    <div class="container">
        <div class="row g-5">
            <div class="col-md-5 col-lg-4">
                <div class="container mb-4 p-3 d-flex justify-content-center">
                    <div class="card p-4">
                        <div class="image d-flex flex-column justify-content-center align-items-center">
                            <span class="name mt-3 mb-3">Профіль</span>
                            <img src="{{asset('storage'.'/default/a7.ico')}}" height="100" width="100" />
                            <span class="name mt-3">Островой Денис</span>
                            <span class="idd">Студент</span>
                            <span class="idd">ТР-82</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Змінити дані</h4>
                <form class="needs-validation" novalidate="">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">ЛОГІН</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Логін" value="" required="">
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">ТЕЛЕФОН</label>
                            <input type="text" class="form-control" id="lastName" placeholder="0999999999" value="" required="">
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Пароль</label>
                            <input type="password" class="form-control" id="address" placeholder="*********" required="">
                        </div>

                        <div class="col-12">
                            <label for="address2" class="form-label">Повторити пароль<span class="text-muted">(Optional)</span></label>
                            <input type="password" class="form-control" id="address2" placeholder="*********">
                        </div>
                    </div>
                    <br>
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Оновити аватар</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </form>
                    <hr class="my-4">

                    <div class="d-flex w-100 h-100 p-3 mx-auto flex-column">
                        <button class="w-100 btn btn-dark btn-lg" type="submit">Оновити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
