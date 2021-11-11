<header class="header">
    <div class="container">
        <div class="header__logo logo">
            <a href="/"> <img src="../img/real_logo.svg" alt="logo"></a>
        </div>
        <ul class="header__nav nav">
            <li class="nav__item"><a href="{{route("house.add")}}">Add house</a></li>
            <li class="nav__item"><a href="#">Nav link</a></li>
            <li class="nav__item"><a href="#">Nav link</a></li>
            <li class="nav__item"><a href="#">Nav link</a></li>
            <li class="nav__item">
                <button class="btn btn-yellow" >
                    <a href={{ route('login')}}>
                        <div class="text-arrow">
                            <span class="text-arrow__item">Work with us</span>
                            <img src="../img/arrow_white.svg" alt="Arrow Next">
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
