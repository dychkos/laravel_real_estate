@extends("layouts.base")


@section("content")
    <section class="banner">
        <div class="banner__gradient">
        </div>
        <div class="banner__bg-image">
            <img src="{{asset("img/house_bg.png")}}" alt="Background" >
        </div>
        <div class="banner__body">
            <div class="container">
                <h1 class="banner__title large-title">
                    Beautiful homes made for you
                </h1>
                <h5 class="banner__text">
                    In oculis quidem se esse admonere interesse enim maxime placeat, facere possimus, omnis. Et quidem faciunt, ut labore et accurate disserendum et harum quidem exercitus quid.
                </h5>
                <div class="banner__footer">
                    <div class="text-arrow">
                        <h6 class="text-arrow__item">See all insights</h6>
                        <img src="{{asset("img/arrow.svg")}}" alt="Arrow Next">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="promotion">
        <div class="promotion__image">
            <img src="{{asset("img/good_hands.png")}}" alt="Good Hands">
        </div>
        <div class="container">
            <div class="row">
                <div class="promotion__body col">
                    <div class="promotion__title marked-title">
                        <div class="mark"></div>
                        <h2>
                            You`re in good hands
                        </h2>
                    </div>
                    <h5 class="promotion__text">
                        Torquatos nostros? quos dolores eos, qui dolorem ipsum per se texit, ne ferae quidem se repellere, idque instituit docere sic: omne animal, simul atque integre iudicante itaque aiunt hanc quasi involuta aperiri, altera occulta quaedam et voluptatem accusantium doloremque.
                    </h5>
                    <button class="btn btn-black">
                        <div class="text-arrow">
                            <span class="text-arrow__item">Learn more</span>
                            <img src="{{asset("img/arrow.svg")}}" alt="Arrow Next">
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="listings">
        <div class="container">
            <div class="listings__title marked-title">
                <div class="mark"></div>
                <h2>
                    Find your next place to live
                </h2>
            </div>
            <div class="listings__dropdown-group row row-cols-2 row-cols-md-4 ">
                <div class="col">
                    <div class="listings__dropdown">
                        <div class="dropdown _dropdown">
                            <div class="dropdown__backdrop" data-type="backdrop" ></div>
                            <div class="dropdown__header">
                                <div class="dropdown__title">Looking for</div>
                                <div class="dropdown__arrow">
                                    <img src="{{asset("img/arrow_down.svg")}}" alt="Arrow down">
                                </div>
                            </div>
                            <div class="dropdown__body">
                                <div class="dropdown__item"  data-type="item" data-id="1">item 1</div>
                                <div class="dropdown__item"  data-type="item" data-id="2">item 2</div>
                                <div class="dropdown__item"  data-type="item" data-id="3">item 3</div>
                                <div class="dropdown__item"  data-type="item" data-id="4">item 4</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="listings__dropdown">
                        <div class="dropdown _dropdown">
                            <div class="dropdown__backdrop" data-type="backdrop" ></div>
                            <div class="dropdown__header">
                                <div class="dropdown__title">Location</div>
                                <div class="dropdown__arrow">
                                    <img src="{{asset("img/arrow_down.svg")}}" alt="Arrow down">
                                </div>
                            </div>
                            <div class="dropdown__body">
                                <div class="dropdown__item"  data-type="item" data-id="1">item 1</div>
                                <div class="dropdown__item"  data-type="item" data-id="2">item 2</div>
                                <div class="dropdown__item"  data-type="item" data-id="3">item 3</div>
                                <div class="dropdown__item"  data-type="item" data-id="4">item 4</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="listings__dropdown">
                        <div class="dropdown _dropdown">
                            <div class="dropdown__backdrop" data-type="backdrop" ></div>
                            <div class="dropdown__header">
                                <div class="dropdown__title">Property type</div>
                                <div class="dropdown__arrow">
                                    <img src="{{asset("img/arrow_down.svg")}}" alt="Arrow down">
                                </div>
                            </div>
                            <div class="dropdown__body">
                                <div class="dropdown__item"  data-type="item" data-id="1">item 1</div>
                                <div class="dropdown__item"  data-type="item" data-id="2">item 2</div>
                                <div class="dropdown__item"  data-type="item" data-id="3">item 3</div>
                                <div class="dropdown__item"  data-type="item" data-id="4">item 4</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="listings__dropdown">
                        <div class="dropdown _dropdown">
                            <div class="dropdown__backdrop" data-type="backdrop" ></div>
                            <div class="dropdown__header">
                                <div class="dropdown__title">Price</div>
                                <div class="dropdown__arrow">
                                    <img src="{{asset("img/arrow_down.svg")}}" alt="Arrow down">
                                </div>
                            </div>
                            <div class="dropdown__body">
                                <div class="dropdown__item"  data-type="item" data-id="1">item 1</div>
                                <div class="dropdown__item"  data-type="item" data-id="2">item 2</div>
                                <div class="dropdown__item"  data-type="item" data-id="3">item 3</div>
                                <div class="dropdown__item"  data-type="item" data-id="4">item 4</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="listings__cards cards">
                <div class="cards__body row row-cols-1 row-cols-sm-2 row-cols-md-3">
                    @foreach($houses as $house)
                        <div class="col">
                            <a href={{{ url('houses/'.$house->id) }}}>
                                <div class="card ">
                                    <div class="card__image">
                                        <img src="{{$house->images->first()->filename}}" alt="House Item">
                                    </div>
                                    <div class="card__title">
                                        <h4>
                                            {{$house->name}}
                                        </h4>
                                    </div>
                                    <div class="card__footer row">
                                        <div class="card__footer-item col">
                                            <img src="{{asset("img/Bed.svg")}}" alt="Bed">
                                            <span class="card__footer-info">
                       {{$house->bedrooms_count}}
                    </span>
                                        </div>
                                        <div class="card__footer-item col ">
                                            <img src="{{asset("img/Shower.svg")}}" alt="Shower">
                                            <span class="card__footer-info">
                       {{$house->showers_count}}
                    </span>
                                        </div>
                                        <div class="card__footer-item col">
                                            <img src="{{asset("img/Size.svg")}}" alt="Size">
                                            <span class="card__footer-info">
                       {{$house->floors_count}}
                    </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="promotion promotion_invert">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 promotion__body">
                    <div class="promotion__title marked-title">
                        <div class="mark"></div>
                        <h2>
                            You`re in good hands
                        </h2>
                    </div>
                    <h5 class="promotion__text">
                        Torquatos nostros? quos dolores eos, qui dolorem ipsum per se texit, ne ferae quidem se repellere, idque instituit docere sic: omne animal, simul atque integre iudicante itaque aiunt hanc quasi involuta aperiri, altera occulta quaedam et voluptatem accusantium doloremque.
                    </h5>
                    <button class="btn btn-black">
                        <div class="text-arrow">
                            <span class="text-arrow__item">Learn more</span>
                            <img src="{{asset("img/arrow.svg")}}" alt="Arrow Next">
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="promotion__image">
            <img src="{{asset("img/good_hands.png")}}" alt="Good Hands">
        </div>
    </section>
    <section class="more-info">
        <div class="more-info__body">
            <div class="more-info__title marked-title ">
                <div class="mark mark_center"></div>
                <h2>
                    You`re in good hands
                </h2>
            </div>
            <h5 class="more-info__text">
                Torquato's nostrils? quos dolores eos, qui dolorem ipsum per se texit, ne ferae quidem se repellere, idque instituit docere sic: omne animal, simul atque integre iudicante itaque aiunt hanc quasi involuta aperiri, altera occulta quaedam et voluptatem accusantium doloremque.
            </h5>
            <button class="btn btn-yellow">
                <div class="text-arrow">
                    <span class="text-arrow__item">Learn more</span>
                    <img src="{{asset("img/arrow_white.svg")}}" alt="Arrow Next">
                </div>
            </button>
        </div>
    </section>
    <section class="comments">
        <div class="container">
            <div class="comments__swiper">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($comments as $comment)
                            <div class="swiper-slide">
                                <div class="col comment marked-title">
                                    <div class="mark mark-full"></div>
                                    <h4 class="comment__title">
                                        “{{ \Illuminate\Support\Str::limit($comment->author_message, 160, $end='...') }}”
                                    </h4>
                                    <div class="comment__author author">
                                        <div class="author__icon">
                                            <img src="{{asset($comment->image ? "/".$comment->image->filename :"img/default_user.png")}}" alt="User Icon">
                                        </div>
                                        <div class="author__info">
                                            <div class="author__name">
                                                <span> {{$comment->author_name}}</span>
                                            </div>
                                            <div class="author__position">
                                                <span>Client</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next">
                        <img src="./img/arrow_down.svg" alt="Arrow">
                    </div>
                    <div class="swiper-button-prev">
                        <img src="./img/arrow_down.svg" alt="Arrow">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@once
    @push("js")
        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
        <script src="{{asset("js/libs/Select.js")}}"></script>
        <script src="{{asset("js/home.js")}}"></script>
    @endpush
@endonce
