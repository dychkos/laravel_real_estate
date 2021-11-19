@extends("layouts.base")


@section("content")
    <section class="page-header">
        <div class="page-header__body">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-header__title house-title">
                            <h3>{{$house->name}}</h3>
                            <h6 class="gray">{{$house->address}}</h6>
                        </div>
                    </div>
                    <div class="col ">
                        <div class="page-header__title page-header__title_text-end house-price">
                            <h3>${{$house->price}}</h3>
                            <h6 class="gray">${{$house->ft_price}}/sq ft</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="house">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <div class="house__info">
                        <div class="house__preview">
                            <div class="row">
                                <div  class="house__photo house__photo_big">
                                    <img id="house-preview" src="{{asset($house->images->first()->filename)}}" alt="House Photo">
                                </div>
                            </div>
                            <div class="row">
                                @foreach($house->images as $img)
                                    <div class="col">
                                        <div class="house__photo house__photo_small">
                                            <img src="{{asset($img->filename)}}" data-photo alt="House Photo">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="house__details card">
                            <div class="card__title">
                                <h4>
                                    Details
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
                                <div class="card__footer-item col">
                                    <img src="{{asset("img/Garage.svg")}}" alt="Garage">
                                    <span class="card__footer-info">
                                {{$house->garage_count}}
                </span>
                                </div>
                                <div class="card__footer-item col ">
                                    <img src="{{asset("img/Date.svg")}}" alt="Date">
                                    <span class="card__footer-info">
                                {{$house->founded_year}}
                </span>
                                </div>
                            </div>
                        </div>
                        <div class="house__description paper">
                            <div class="paper__title">
                                <h4>Description</h4>
                            </div>
                            <div class="paper__body">
                                {{$house->description}}
                            </div>
                        </div>
                        @if($house->features()->get()->isNotEmpty())
                            <div class="house__features paper">
                                <div class="paper__title">
                                    <h4>Features</h4>
                                </div>
                                <div class="paper__body">
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 ">
                                        @foreach($house->features as $feature)
                                        <div class="feature">
                                            <div class="feature__icon">
                                                <img src="{{asset("img/check.svg")}}" alt="Feature">
                                            </div>
                                            <span class="feature__item">{{$feature->title}}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-4">
                    @if($user && $user->canEdit($house->id))
                        <div class="card">
                            <div class="card__title author">
                                @if($user->image)
                                    <div class="author__icon">
                                        <img src="{{asset('/'.$user->image->filename)}}" width="50px" height="50px" alt="User Icon">
                                    </div>
                                @endif
                                <div class="author__info">
                                    <div class="author__name author__name-thin">
                                        <span>{{$user->name}}</span>
                                    </div>
                                    <div class="author__more">
                                        <span><a href="#">{{$user->email}}</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card__footer">
                                <button class="btn btn-yellow ">
                                    <div class="text-arrow">
                                        <a href="{{route("user.houses.edit",$house->id)}}">
                                            <span class="text-arrow__item">Edit house info </span>
                                            <img src="{{asset("img/arrow_white.svg")}}" alt="Arrow Next">
                                        </a>
                                    </div>
                                </button>
                            </div>
                        </div>
                    @else
                    <form class="house__order" method="POST" >
                        @csrf
                        <div class="house__order-author author">
                            @if($house->user->image)
                            <div class="author__icon">
                                <img src="{{asset("/".$house->user->image->filename)}}" alt="User Icon">
                            </div>
                            @endif
                            <div class="author__info">
                                <div class="author__name author__name-thin">
                                    <span>{{$house->user->name}}</span>
                                </div>
                                <div class="author__more">
                                    <span><a href="#">View profile</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="house__order-field">
                            @error("customer_name")
                            <div class="validation-fail">{{$message}}</div>
                            @enderror
                            <input type="text" name="customer_name" value="{{$user->name ?? ""}}" placeholder="Name">
                        </div>
                        <div class="house__order-field">
                            @error("customer_email")
                            <div class="validation-fail">{{$message}}</div>
                            @enderror
                            <input type="email" name="customer_email" value="{{$user->email ?? ""}}" placeholder="Email">
                        </div>
                        <div class="house__order-field">
                            @error("customer_phone")
                            <div class="validation-fail">{{$message}}</div>
                            @enderror
                            <input type="text" name="customer_phone" placeholder="Phone">
                        </div>
                        <div class="house__order-field">
                            @error("customer_message")
                            <div class="validation-fail">{{$message}}</div>
                            @enderror
                            <textarea name="customer_message" placeholder="Hello, I am interested in…"></textarea>
                        </div>
                        <div class="houser__order-field">
                            @if(session()->has('message'))
                                <div class="yellow">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <button type="submit" class="btn btn-black full-width">
                                <div class="text-arrow">
                                    <span class="text-arrow__item">Send order</span>
                                    <img src="{{asset("img/arrow.svg")}}" alt="Arrow Next">
                                </div>
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @if(isset($similarHouses))
    <section class="similar">
        <div class="container">
            <div class="similar__title marked-title">
                <div class="mark"></div>
                <h2>
                    Similar listings
                </h2>
            </div>
            <div class="similar__swiper">
                <div class="swiper sim-swiper">
                    <div class="swiper-wrapper">
                        @foreach($similarHouses as $similar)
                            <div class="swiper-slide">
                                <a href={{{ url('houses/'.$similar->id) }}}>
                                    <div class="card ">
                                        <div class="card__image">
                                            <img src="{{asset("/".$similar->images->first()->filename)}}" alt="House Item">
                                        </div>
                                        <div class="card__title">
                                            <h4>
                                                {{$similar->name}}
                                            </h4>
                                        </div>
                                        <div class="card__footer row">
                                            <div class="card__footer-item col">
                                                <img src="{{asset("img/Bed.svg")}}" alt="Bed">
                                                <span class="card__footer-info">
                       {{$similar->bedrooms_count}}
                    </span>
                                            </div>
                                            <div class="card__footer-item col ">
                                                <img src="{{asset("img/Shower.svg")}}" alt="Shower">
                                                <span class="card__footer-info">
                       {{$similar->showers_count}}
                    </span>
                                            </div>
                                            <div class="card__footer-item col">
                                                <img src="{{asset("img/Size.svg")}}" alt="Size">
                                                <span class="card__footer-info">
                       {{$similar->floors_count}}
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
        </div>
    </section>
    @endif
@endsection

@once
    @push("js")
        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
        <script src="{{asset("js/libs/PhotoPreview.js")}}"></script>
        <script src="{{asset("js/houses/show.js")}}"></script>
    @endpush
@endonce

