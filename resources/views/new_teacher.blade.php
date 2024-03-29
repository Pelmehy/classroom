@extends('layouts.app')

@section('title-block')
    Додавання викладача
@endsection

@section('content')
    <div class="container center">
        <h4 class="text-center mb-3">Змінити дані</h4>
        <hr class="my-4">
        <form action="{{route('addTeacher')}}" method="post" class="row g-5">
            @csrf
            <div class="col-md-5 col-lg-6">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Прізвище</label>
                        <input type="text" class="form-control" name="lastName" placeholder="" value="" required="">
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Ім'я</label>
                        <input type="text" class="form-control" name="firstName" placeholder="" value="" required="">
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">По батькові </label>
                        <input type="text" class="form-control" name="middleName" placeholder="">
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Факультет</label>
                        <input type="text" class="form-control" name="faculty" placeholder="" required="">
                    </div>
                </div>
                <br>

            </div>
            <div class="col-md-7 col-lg-6">
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="lastName" class="form-label">ТЕЛЕФОН</label>
                        <input type="text" class="form-control" name="phone" placeholder="0999999999" pattern="\[0-9]{9}" value="" required="">
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email </label>
                        <input type="email" class="form-control" name="email" placeholder="you@example.com">
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Пароль</label>
                        <input type="text" class="password form-control" name="password" placeholder="*********" required="" readonly>
                    </div>

                    <div class="col-12">
                        <a id="get_pass" class="btn btn-success">Генерувати пароль</a>
                    </div>
                </div>
            </div>
            <div class="w-20 h-100 p-3 text-center">
                <button class="text-center p-6 btn btn-dark btn-lg" type="submit">Оновити</button>
            </div>
        </form>
    </div>
@endsection
