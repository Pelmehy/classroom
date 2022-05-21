@extends('layouts.app')

@section('title-block')
    Додавання студентів
@endsection

@section('content')
    <div class="container center">
        <div class="row g-5">
            <h4 class="text-center mb-3">Додати студентів</h4>
            <hr class="my-4">
            <form action="{{route('addStudents')}}" method="post" class="needs-validation" novalidate="">
                @csrf
                <div class="row text-center">
                    <div class="col">
                        <input class="form-control" list="datalistOptions" name="faculty" placeholder="Факультет">
                        <datalist id="faculty">
                            <option value="ТЕФ">
                            <option value="ФІВТ">
                            <option value="ФБМІ">
                            <option value="ІПСА">
                        </datalist>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="group" placeholder="Група" value="" required="">
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <input type="value" name="val" id="val" class="form-control" placeholder="Кількість студентів" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col">
                        <a id="student_count" class="btn btn-success">Підтвердити</a>
                    </div>
                </div>

                <div class="row reg-form">


                    <script src="/js/students.js"></script>
                </div>

                <div class="add_students">
                    <button type="submit" class="btn btn-success std-btn">Підтвердити</button>
                    <button type="button" id="get_pass" class="btn btn-success std-btn">Генерувати паролі</button>
                </div>
            </form>
        </div>
        <div class="" style="min-height: 85px;"></div>
    </div>
@endsection
