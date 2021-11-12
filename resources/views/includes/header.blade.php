<header class="header">
    <div class="container">
        <div class="header__logo logo">
            <a href="/"> <img src="{{asset('img/real_logo.svg')}}" alt="logo"></a>
        </div>
        <ul class="header__nav nav">
            <li class="nav__item"><a href="#">Nav link</a></li>
            <li class="nav__item"><a href="#">Nav link</a></li>
            <li class="nav__item"><a href="#">Nav link</a></li>
            @if(\Illuminate\Support\Facades\Auth::check())
                <li class="nav__item"><a href="{{route("login.logout")}}">Logout</a></li>
            @endif
            <li class="nav__item">
                <button class="btn btn-yellow" >
                    <a href={{ \Illuminate\Support\Facades\Auth::check()?route("user.houses"):route('login')}}>
                        <div class="text-arrow">
                            <span class="text-arrow__item">{{\Illuminate\Support\Facades\Auth::check() ? "My sales":"Work with us"}}</span>
                            <img src="{{asset('img/arrow_white.svg')}}" alt="Arrow Next">
                        </div>
                    </a>
                </button>
            </li>
        </ul>
        <div class="burger" data-menu="2">
            <div class="icon"></div>
        </div>
    </div>
</header>
