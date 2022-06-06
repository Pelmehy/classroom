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
                            @if($user_info->img === ' ')
                            <img src="{{asset('storage'.'/default/a'.($user_info->user_id % 12 + 1).'.ico')}}" height="100" width="100" />
                            @else
                            <img src="{{asset('storage'.$user_info->img)}}" height="100" width="100" style="border-radius: 100%" />
                            @endif
                            <span class="name mt-3 ml-5">{{$user->name}}</span>
                            <span class="idd">{{$user_info->type}}</span>
                            @if($access == 1)
                            <span class="idd">{{$user_info->group}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @if($error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endif
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Змінити дані</h4>

                <form class="needs-validation" action="{{route('update_profile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="lastName" class="form-label">Телефон <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" name="phone" placeholder="{{$user_info->phone}}" value="" pattern="[0-9]{10}">
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" name="email" placeholder="{{$user->email}}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Пароль</label>
                            <input type="password" class="form-control" name="password1" placeholder="*********" pattern=".{8,}">
                        </div>

                        <div class="col-12">
                            <label for="address2" class="form-label">Повторити пароль</label>
                            <input type="password" class="form-control" name="$password2" placeholder="*********" pattern=".{8,}">
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Оновити аватар</label>
                        <input type="file" class="form-control-file" name="file">
                    </div>

                    <hr class="my-4">

                    <div class="d-flex w-100 h-100 p-3 mx-auto flex-column">
                        <button class="w-100 btn btn-dark btn-lg" type="submit">Оновити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
