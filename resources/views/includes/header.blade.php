<header class="header">
    <div class="container">
        <div class="logo">
            <a href="/"> <img src="{{asset('img/real_logo.svg')}}" alt="logo"></a>
        </div>
        <div class="header__nav">
            <ul class="nav">
                <li class="nav__item">
                    <div class="header__mobile-logo logo">
                        <a href="/"> <img src="{{asset("img/real_logo.svg")}}" alt="logo"></a>
                    </div>
                </li>

                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="nav__item"><a href="{{route("user.orders")}}">Orders</a></li>
                    <li class="nav__item"><a href="{{route("login.logout")}}">Logout</a></li>
                @endif

                <li class="nav__item nav__item_absolute">
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
        </div>
        <div class="burger" data-menu="2">
            <div class="icon"></div>
        </div>
    </div>
</header>

@once
    @push("js")
        <script src="{{asset("js/components/burger.js")}}"></script>
    @endpush
@endonce
