@extends('layouts.app')

@section('title-block')
    Додавання студентів
@endsection

@section('content')
    <div class="container center">
        <div class="row g-5">
            <h4 class="text-center mb-3">Додати студентів</h4>
            <hr class="my-4">
            <div class="row text-center">
                <div class="col">
                    <select class="form-select" name="faculty" aria-label="Default select example">
                        <option value="0" selected>Факультет</option>
                        {{--                    @foreach($faculties as $faculty)--}}
                        {{--                        <option value="{{$faculty->id}}">{{$faculty->name}}</option>--}}
                        {{--                    @endforeach--}}
                    </select>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="firstName" placeholder="Група" value="" required="">
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="value" name="val" class="form-control" placeholder="Кількість студентів" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success">Підтвердити</button>
                </div>
            </div>
            <div class="col-md-5 col-lg-6">
                <form class="needs-validation" novalidate="">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Фамілія</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Ім'я</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">По батькові </label>
                            <input type="text" class="form-control" id="email" placeholder="">
                        </div>
                    </div>
                    <br>
                </form>
            </div>
            <div class="col-md-7 col-lg-6">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Email</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Логін" value="" required="">
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Телефон</label>
                        <input type="text" class="form-control" id="lastName" placeholder="0999999999" value="" required="">
                    </div>
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">ЛОГІН</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Логін" value="" required="">
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Пароль</label>
                        <input type="text" class="form-control" id="lastName" placeholder="*********" value="" required="">
                    </div>
                </div>
            </div>
            <hr class="my-4">

            <div class="col-md-5 col-lg-6">
                <form class="needs-validation" novalidate="">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Фамілія</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Ім'я</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">По батькові </label>
                            <input type="text" class="form-control" id="email" placeholder="">
                        </div>
                    </div>
                    <br>
                </form>
            </div>
            <div class="col-md-7 col-lg-6">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Email</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Логін" value="" required="">
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Телефон</label>
                        <input type="text" class="form-control" id="lastName" placeholder="0999999999" value="" required="">
                    </div>
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">ЛОГІН</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Логін" value="" required="">
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Пароль</label>
                        <input type="text" class="form-control" id="lastName" placeholder="*********" value="" required="">
                    </div>
                </div>
            </div>
            <hr class="my-4">

            <div class="col-md-5 col-lg-6">
                <form class="needs-validation" novalidate="">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Фамілія</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Ім'я</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">По батькові </label>
                            <input type="text" class="form-control" id="email" placeholder="">
                        </div>
                    </div>
                    <br>
                </form>
            </div>
            <div class="col-md-7 col-lg-6">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Email</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Логін" value="" required="">
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Телефон</label>
                        <input type="text" class="form-control" id="lastName" placeholder="0999999999" value="" required="">
                    </div>
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">ЛОГІН</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Логін" value="" required="">
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Пароль</label>
                        <input type="text" class="form-control" id="lastName" placeholder="*********" value="" required="">
                    </div>
                </div>
            </div>
            <hr class="my-4">

            <div class="col-md-5 col-lg-6">
                <form class="needs-validation" novalidate="">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Фамілія</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Ім'я</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">По батькові </label>
                            <input type="text" class="form-control" id="email" placeholder="">
                        </div>
                    </div>
                    <br>
                </form>
            </div>
            <div class="col-md-7 col-lg-6">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Email</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Логін" value="" required="">
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Телефон</label>
                        <input type="text" class="form-control" id="lastName" placeholder="0999999999" value="" required="">
                    </div>
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">ЛОГІН</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Логін" value="" required="">
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Пароль</label>
                        <input type="text" class="form-control" id="lastName" placeholder="*********" value="" required="">
                    </div>
                </div>
            </div>
            <hr class="my-4">

            <div class="add_students">
                <div class="btn btn-success std-btn">Генерувати паролі</div>
                <div class="btn btn-success std-btn">Оновити</div>
            </div>
        </div>
    </div>
@endsection
