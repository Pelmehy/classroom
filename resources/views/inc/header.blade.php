<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarsExample05">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Особистий кабінет</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Дошка оголошень</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-left mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Курси</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Календар</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Оцінки</a>
                    </li>
                    @if (Route::has('login'))
                        @auth

                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">

                                    @csrf

                                    <x-dropdown-link : class="nav-link active"
                                                     href="route('logout')"
                                                     onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        Log out
                                    </x-dropdown-link>

                                </form>
                            </li>

                        @else
                            <li class="hidden nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Вихід</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="hidden nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
