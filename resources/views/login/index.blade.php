@extends("layouts.base")

@section("content")
    @include('includes.page_header',["title"=>"Login"])
    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <form action="{{route("login.store")}}" method="POST" class="login-form" >
                        @csrf
                        <div class="login-form__item">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email">
                        </div>

                        <div class="login-form__item">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password">
                        </div>

                        <div class="login-form__item">
                            <input type="checkbox" name="remember_me" id="remember_me">  <label for="remember_me">Remember me</label>
                        </div>

                        <div class="login-form__footer">
                            <div class="login-form__item">
                                <button type="submit" class="btn btn-yellow">
                                    <div class="text-arrow">
                                        <span class="text-arrow__item">Login</span>
                                        <img src="./img/arrow_white.svg" alt="Arrow Next">
                                    </div>
                                </button>
                            </div>
                            <p>
                                If you haven`t account please <a class="link" href="{{"registration"}}">Register</a>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
