<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarsExample05">
                @if (Route::has('login'))
                    @auth
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{route('profile')}}">Особистий кабінет</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('main')}}">Дошка оголошень</a>
                            </li>
                            @if($access > 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('new_students')}}">Нові студенти</a>
                                </li>
                                @if($access > 2)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('new_teacher')}}">Новий викладач</a>
                                    </li>
                                @endif
                            @endif
                        </ul>

                        <ul class="navbar-nav me-left mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('courses')}}">Курси</a>
                            </li>
                            @if($access > 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('add_course_view')}}">Додати курс</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('groups_rating')}}">Групи</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="#">Календар</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('studentRating')}}">Поточний контроль</a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">

                                    @csrf

                                    <x-dropdown-link : class="nav-link active"
                                                     href="route('logout')"
                                                     onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        Вихід
                                    </x-dropdown-link>

                                </form>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('main')}}">Дошка оголошень</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav me-left mb-2 mb-lg-0">
                            <li class="hidden nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Вхід</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="hidden nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Реєстрація</a>
                                </li>
                            @endif
                        </ul>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>
