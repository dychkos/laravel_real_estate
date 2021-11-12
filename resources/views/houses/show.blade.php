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
                <div class="col-lg-7">
                    <div class="house__info">
                        <div class="house__preview">
                            <div class="row">
                                <div  class="house__photo house__photo_big">
                                    <img id="house-preview" src="{{"../".$house->images->first()->filename}}" alt="House Photo">
                                </div>
                            </div>
                            <div class="row">
                                @foreach($house->images as $img)
                                    <div class="col">
                                        <div class="house__photo house__photo_small">
                                            <img src={{"../".$img->filename}} data-photo alt="House Photo">
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
                        <div class="house__features paper">
                            <div class="paper__title">
                                <h4>Features</h4>
                            </div>
                            <div class="paper__body">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 ">
                                    <div class="feature">
                                        <div class="feature__icon">
                                            <img src="{{asset("img/check.svg")}}" alt="Feature">
                                        </div>
                                        <span class="feature__item">Air Conditioning</span>
                                    </div>
                                    <div class="feature">
                                        <div class="feature__icon">
                                            <img src="{{asset("img/check.svg")}}" alt="Feature">
                                        </div>
                                        <span class="feature__item">Air Conditioning</span>
                                    </div>
                                    <div class="feature">
                                        <div class="feature__icon">
                                            <img src="{{asset("img/check.svg")}}" alt="Feature">
                                        </div>
                                        <span class="feature__item">Air Conditioning</span>
                                    </div>
                                    <div class="feature">
                                        <div class="feature__icon">
                                            <img src="{{asset("img/check.svg")}}" alt="Feature">
                                        </div>
                                        <span class="feature__item">Air Conditioning</span>
                                    </div>
                                    <div class="feature">
                                        <div class="feature__icon">
                                            <img src="{{asset("img/check.svg")}}" alt="Feature">
                                        </div>
                                        <span class="feature__item">Air Conditioning</span>
                                    </div>
                                    <div class="feature">
                                        <div class="feature__icon">
                                            <img src="{{asset("img/check.svg")}}" alt="Feature">
                                        </div>
                                        <span class="feature__item">Air Conditioning</span>
                                    </div>
                                    <div class="feature">
                                        <div class="feature__icon">
                                            <img src="{{asset("img/check.svg")}}" alt="Feature">
                                        </div>
                                        <span class="feature__item">Air Conditioning</span>
                                    </div>
                                    <div class="feature">
                                        <div class="feature__icon">
                                            <img src="{{asset("img/check.svg")}}" alt="Feature">
                                        </div>
                                        <span class="feature__item">Air Conditioning</span>
                                    </div>
                                    <div class="feature">
                                        <div class="feature__icon">
                                            <img src="{{asset("img/check.svg")}}" alt="Feature">
                                        </div>
                                        <span class="feature__item">Air Conditioning</span>
                                    </div>
                                    <div class="feature">
                                        <div class="feature__icon">
                                            <img src="{{asset("img/check.svg")}}" alt="Feature">
                                        </div>
                                        <span class="feature__item">Air Conditioning</span>
                                    </div>
                                    <div class="feature">
                                        <div class="feature__icon">
                                            <img src="{{asset("img/check.svg")}}" alt="Feature">
                                        </div>
                                        <span class="feature__item">Air Conditioning</span>
                                    </div>
                                    <div class="feature">
                                        <div class="feature__icon">
                                            <img src="{{asset("img/check.svg")}}" alt="Feature">
                                        </div>
                                        <span class="feature__item">Air Conditioning</span>
                                    </div>
                                    <div class="feature">
                                        <div class="feature__icon">
                                            <img src="{{asset("img/check.svg")}}" alt="Feature">
                                        </div>
                                        <span class="feature__item">Air Conditioning</span>
                                    </div>
                                    <div class="feature">
                                        <div class="feature__icon">
                                            <img src="{{asset("img/check.svg")}}" alt="Feature">
                                        </div>
                                        <span class="feature__item">Air Conditioning</span>
                                    </div>
                                    <div class="feature">
                                        <div class="feature__icon">
                                            <img src="{{asset("img/check.svg")}}" alt="Feature">
                                        </div>
                                        <span class="feature__item">Air Conditioning</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <form class="house__order">
                        <div class="house__order-author author">
                            <div class="author__icon">
                                <img src="../img/user_icon.png" alt="User Icon">
                            </div>
                            <div class="author__info">
                                <div class="author__name author__name-thin">
                                    <span>Lara Madrigal</span>
                                </div>
                                <div class="author__more">
                                    <span><a href="#">View profile</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="house__order-field">
                            <input type="text" placeholder="Name">
                        </div>
                        <div class="house__order-field">
                            <input type="text" placeholder="Phone">
                        </div>
                        <div class="house__order-field">
                            <input type="email" placeholder="Email">
                        </div>
                        <div class="house__order-field">
                            <textarea placeholder="Hello, I am interested in…"></textarea>
                        </div>
                        <div class="houser__order-field">
                            <button type="submit" class="btn btn-black full-width">
                                <div class="text-arrow">
                                    <span class="text-arrow__item">Learn more</span>
                                    <img src="{{asset("img/arrow.svg")}}" alt="Arrow Next">
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
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
                        <div class="swiper-slide">
                            <div class="card ">
                                <div class="card__image">
                                    <img src="{{asset("img/house1.png")}}" alt="House Item">
                                </div>
                                <div class="card__title">
                                    <h4>
                                        Malto House
                                    </h4>
                                </div>
                                <div class="card__footer row">
                                    <div class="card__footer-item col">
                                        <img src="{{asset("img/Bed.svg")}}" alt="Bed">
                                        <span class="card__footer-info">
                  7
                </span>
                                    </div>
                                    <div class="card__footer-item col ">
                                        <img src="{{asset("img/Shower.svg")}}" alt="Shower">
                                        <span class="card__footer-info">
                  14
                </span>
                                    </div>
                                    <div class="card__footer-item col">
                                        <img src="{{asset("img/Size.svg")}}" alt="Size">
                                        <span class="card__footer-info">
                  4
                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card ">
                                <div class="card__image">
                                    <img src="{{asset("img/house_bg.png")}}" alt="House Item">
                                </div>
                                <div class="card__title">
                                    <h4>
                                        Malto House
                                    </h4>
                                </div>
                                <div class="card__footer row">
                                    <div class="card__footer-item col">
                                        <img src="{{asset("img/Bed.svg")}}" alt="Bed">
                                        <span class="card__footer-info">
                  7
                </span>
                                    </div>
                                    <div class="card__footer-item col ">
                                        <img src="{{asset("img/Shower.svg")}}" alt="Shower">
                                        <span class="card__footer-info">
                  14
                </span>
                                    </div>
                                    <div class="card__footer-item col">
                                        <img src="{{asset("img/Size.svg")}}" alt="Size">
                                        <span class="card__footer-info">
                  4
                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card ">
                                <div class="card__image">
                                    <img src="{{asset("img/house_bg.png")}}" alt="House Item">
                                </div>
                                <div class="card__title">
                                    <h4>
                                        Malto House
                                    </h4>
                                </div>
                                <div class="card__footer row">
                                    <div class="card__footer-item col">
                                        <img src="{{asset("img/Bed.svg")}}" alt="Bed">
                                        <span class="card__footer-info">
                  7
                </span>
                                    </div>
                                    <div class="card__footer-item col ">
                                        <img src="{{asset("img/Shower.svg")}}" alt="Shower">
                                        <span class="card__footer-info">
                  14
                </span>
                                    </div>
                                    <div class="card__footer-item col">
                                        <img src="{{asset("img/Size.svg")}}" alt="Size">
                                        <span class="card__footer-info">
                  4
                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card ">
                                <div class="card__image">
                                    <img src="{{asset("img/house1.png")}}" alt="House Item">
                                </div>
                                <div class="card__title">
                                    <h4>
                                        Malto House
                                    </h4>
                                </div>
                                <div class="card__footer row">
                                    <div class="card__footer-item col">
                                        <img src="{{asset("img/Bed.svg")}}" alt="Bed">
                                        <span class="card__footer-info">
                  7
                </span>
                                    </div>
                                    <div class="card__footer-item col ">
                                        <img src="{{asset("img/Shower.svg")}}" alt="Shower">
                                        <span class="card__footer-info">
                  14
                </span>
                                    </div>
                                    <div class="card__footer-item col">
                                        <img src="{{asset("img/Size.svg")}}" alt="Size">
                                        <span class="card__footer-info">
                  4
                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card ">
                                <div class="card__image">
                                    <img src="{{asset("img/house_bg.png")}}" alt="House Item">
                                </div>
                                <div class="card__title">
                                    <h4>
                                        Malto House
                                    </h4>
                                </div>
                                <div class="card__footer row">
                                    <div class="card__footer-item col">
                                        <img src="{{asset("img/Bed.svg")}}" alt="Bed">
                                        <span class="card__footer-info">
                  7
                </span>
                                    </div>
                                    <div class="card__footer-item col ">
                                        <img src="{{asset("img/Shower.svg")}}" alt="Shower">
                                        <span class="card__footer-info">
                  14
                </span>
                                    </div>
                                    <div class="card__footer-item col">
                                        <img src="{{asset("img/Size.svg")}}" alt="Size">
                                        <span class="card__footer-info">
                  4
                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card ">
                                <div class="card__image">
                                    <img src="{{asset("img/house1.png")}}" alt="House Item">
                                </div>
                                <div class="card__title">
                                    <h4>
                                        Malto House
                                    </h4>
                                </div>
                                <div class="card__footer row">
                                    <div class="card__footer-item col">
                                        <img src="{{asset("img/Bed.svg")}}" alt="Bed">
                                        <span class="card__footer-info">
                  7
                </span>
                                    </div>
                                    <div class="card__footer-item col ">
                                        <img src="{{asset("img/Shower.svg")}}" alt="Shower">
                                        <span class="card__footer-info">
                  14
                </span>
                                    </div>
                                    <div class="card__footer-item col">
                                        <img src="{{asset("img/Size.svg")}}" alt="Size">
                                        <span class="card__footer-info">
                  4
                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card ">
                                <div class="card__image">
                                    <img src="{{asset("img/house_bg.png")}}" alt="House Item">
                                </div>
                                <div class="card__title">
                                    <h4>
                                        Malto House
                                    </h4>
                                </div>
                                <div class="card__footer row">
                                    <div class="card__footer-item col">
                                        <img src="{{asset("img/Bed.svg")}}" alt="Bed">
                                        <span class="card__footer-info">
                  7
                </span>
                                    </div>
                                    <div class="card__footer-item col ">
                                        <img src="{{asset("img/Shower.svg")}}" alt="Shower">
                                        <span class="card__footer-info">
                  14
                </span>
                                    </div>
                                    <div class="card__footer-item col">
                                        <img src="{{asset("img/Size.svg")}}" alt="Size">
                                        <span class="card__footer-info">
                  4
                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
