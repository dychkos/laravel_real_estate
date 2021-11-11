@extends("layouts.base")

@section("content")
    @include('includes.page_header',["title"=>"Registration"])
    <section class="login">
        <div class="container">
           <div class="row">
               <div class="col-12 col-md-6 offset-md-3">
                   <form action="{{route("registration.store")}}" method="POST" class="login-form">
                       @csrf
                       <div class="login-form__item">
                           <label for="username">Name</label>
                           <input type="text" name="username" id="username">
                       </div>

                       <div class="login-form__item">
                           <label for="email">Email</label>
                           <input type="email" name="email" id="email">
                       </div>

                       <div class="login-form__item">
                           <label for="password">Password</label>
                           <input type="password" name="password" id="password">
                       </div>

                       <div class="login-form__item">
                           <label for="confirm_password">Confirm password</label>
                           <input type="password" name="confirm_password" id="confirm_password">
                       </div>

                       <div class="login-form__footer">
                           <div class="login-form__item">
                               <button type="submit" class="btn btn-yellow">
                                   <div class="text-arrow">
                                       <span class="text-arrow__item">Register</span>
                                       <img src="./img/arrow_white.svg" alt="Arrow Next">
                                   </div>
                               </button>
                           </div>
                           <p>
                               Already have account ? Please <a class="link" href="{{route("login")}}">Login</a>
                           </p>
                       </div>

                   </form>
               </div>
           </div>
        </div>
    </section>

@endsection
