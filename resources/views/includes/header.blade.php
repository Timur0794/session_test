<header class="py-3 border-bottom">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                <a href="{{route('home')}}"> главная</a>
            </div>
            <h1>Head</h1>
            <div>
                <ul>
                    @auth()
                        <li>
                            <a href="{{route('user.home')}}">Кабинет</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                                выход
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                    <li>
                        <a href="{{route('login')}}">Вход</a>
                        <a href="{{route('register')}}">Регистрация</a>
                    </li>
                    @endauth
                </ul>

            </div>

        </div>
    </div>
</header>
