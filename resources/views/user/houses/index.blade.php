@extends("layouts.base")

@section("content")
    @include('includes.page_header',["title"=>"Your sales"])
    <section class="house">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="houses row">
                        <div class="col">
                            <div class="houses__house houses__house-empty card">
                                <div class="card__title">
                                    <h4>You haven't added any houses yet</h4>
                                </div>
                                <div class="card__footer">
                                    <button class="btn btn-yellow ">
                                        <a href="{{route("user.houses.create")}}">
                                            <div class="text-arrow">
                                                <span class="text-arrow__item">Sale house </span>
                                                <img src="../img/arrow_white.svg" alt="Arrow Next">
                                            </div>
                                        </a>
                                    </button>
                                </div>
                            </div>
                            <div class="houses__house card">
                                <div class="card__image">
                                    <img src="../img/house_bg.png" alt="House Item">
                                </div>
                                <div class="card__title">
                                    <h4>
                                        Malto House
                                    </h4>
                                </div>
                                <div class="card__footer row">
                                    <div class="card__footer-item col">
                                        <img src="../img/Bed.svg" alt="Bed">
                                        <span class="card__footer-info">
                  7
                </span>
                                    </div>
                                    <div class="card__footer-item col ">
                                        <img src="../img/Shower.svg" alt="Shower">
                                        <span class="card__footer-info">
                  14
                </span>
                                    </div>
                                    <div class="card__footer-item col">
                                        <img src="../img/Size.svg" alt="Size">
                                        <span class="card__footer-info">
                  4
                </span>
                                    </div>
                                    <div class="card__footer-item col">
                                        <img src="../img/Garage.svg" alt="Garage">
                                        <span class="card__footer-info">
                  2
                </span>
                                    </div>
                                    <div class="card__footer-item col ">
                                        <img src="../img/Date.svg" alt="Date">
                                        <span class="card__footer-info">
                  2012
                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="houses__house card">
                                <div class="card__image">
                                    <img src="../img/house_bg.png" alt="House Item">
                                </div>
                                <div class="card__title">
                                    <h4>
                                        Malto House
                                    </h4>
                                </div>
                                <div class="card__footer row">
                                    <div class="card__footer-item col">
                                        <img src="../img/Bed.svg" alt="Bed">
                                        <span class="card__footer-info">
                  7
                </span>
                                    </div>
                                    <div class="card__footer-item col ">
                                        <img src="../img/Shower.svg" alt="Shower">
                                        <span class="card__footer-info">
                  14
                </span>
                                    </div>
                                    <div class="card__footer-item col">
                                        <img src="../img/Size.svg" alt="Size">
                                        <span class="card__footer-info">
                  4
                </span>
                                    </div>
                                    <div class="card__footer-item col">
                                        <img src="../img/Garage.svg" alt="Garage">
                                        <span class="card__footer-info">
                  2
                </span>
                                    </div>
                                    <div class="card__footer-item col ">
                                        <img src="../img/Date.svg" alt="Date">
                                        <span class="card__footer-info">
                  2012
                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="houses__house card">
                                <div class="card__image">
                                    <img src="../img/house_bg.png" alt="House Item">
                                </div>
                                <div class="card__title">
                                    <h4>
                                        Malto House
                                    </h4>
                                </div>
                                <div class="card__footer row">
                                    <div class="card__footer-item col">
                                        <img src="../img/Bed.svg" alt="Bed">
                                        <span class="card__footer-info">
                  7
                </span>
                                    </div>
                                    <div class="card__footer-item col ">
                                        <img src="../img/Shower.svg" alt="Shower">
                                        <span class="card__footer-info">
                  14
                </span>
                                    </div>
                                    <div class="card__footer-item col">
                                        <img src="../img/Size.svg" alt="Size">
                                        <span class="card__footer-info">
                  4
                </span>
                                    </div>
                                    <div class="card__footer-item col">
                                        <img src="../img/Garage.svg" alt="Garage">
                                        <span class="card__footer-info">
                  2
                </span>
                                    </div>
                                    <div class="card__footer-item col ">
                                        <img src="../img/Date.svg" alt="Date">
                                        <span class="card__footer-info">
                  2012
                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card__title">
                            <div class="author__info">

                                <div class="author__name author__name-thin">
                                    <span>Lara Madrigal</span>
                                </div>
                                <div class="author__more">
                                    <span><a href="#">dychkosergy@gmail.com</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="card__footer">
                            <button class="btn btn-yellow ">
                                <div class="text-arrow">
                                    <span class="text-arrow__item">Edit info </span>
                                    <img src="../img/arrow_white.svg" alt="Arrow Next">
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
