@extends("layouts.base")

@section("content")
    @include('includes.page_header',["title"=>"Your sales"])
    <section class="house">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <div class="houses row">
                        <div class="col">
                            <div class="houses__house houses__house-empty card">
                                <div class="card__title">
                                    <h4>You can add new house to sale</h4>
                                </div>
                                <div class="card__footer">
                                    <button class="btn btn-yellow">
                                        <a href="{{route("user.houses.create")}}">
                                            <div class="text-arrow">
                                                <span class="text-arrow__item">Sale house </span>
                                                <img src="../img/arrow_white.svg" alt="Arrow Next">
                                            </div>
                                        </a>
                                    </button>
                                </div>
                            </div>
                            @foreach($houses as $house)
                                <a href={{{ route('user.houses.show',$house->id) }}}>
                                    <div class="houses__house card">
                                    <div class="card__image">
                                        <img src="{{asset("storage/".$house->images->first()->filename)}}" alt="House Item">
                                    </div>
                                    <div class="card__title">
                                        <h4>
                                            {{$house->name}}
                                        </h4>
                                    </div>
                                    <div class="card__footer row">
                                        <div class="card__footer-item col">
                                            <img src="../img/Bed.svg" alt="Bed">
                                            <span class="card__footer-info">
                  {{$house->bedrooms_count}}
                </span>
                                        </div>
                                        <div class="card__footer-item col ">
                                            <img src="../img/Shower.svg" alt="Shower">
                                            <span class="card__footer-info">
                    {{$house->showers_count}}
                </span>
                                        </div>
                                        <div class="card__footer-item col">
                                            <img src="../img/Size.svg" alt="Size">
                                            <span class="card__footer-info">
                    {{$house->floors_count}}
                </span>
                                        </div>
                                        <div class="card__footer-item col">
                                            <img src="../img/Garage.svg" alt="Garage">
                                            <span class="card__footer-info">
                   {{$house->garage_count}}
                </span>
                                        </div>
                                        <div class="card__footer-item col ">
                                            <img src="../img/Date.svg" alt="Date">
                                            <span class="card__footer-info">
                   {{$house->founded_year}}
                </span>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card__title author">
                            @if($user->image)
                                <div class="author__icon">
                                    <img src="{{asset('storage/'.$user->image->filename)}}" width="50px" height="50px" alt="User Icon">
                                </div>
                            @endif
                            <div class="author__info">
                                <div class="author__name author__name-thin">
                                    <span>{{$user->name}}</span>
                                </div>
                                <span class="link"><a href="{{route("user.edit")}}">Change profile info</a></span>
                            </div>
                        </div>
                        <div class="card__footer">
                            <a href="{{route("user.orders")}}">
                                <button class="btn btn-yellow ">
                                    <div class="text-arrow">
                                        <span class="text-arrow__item">My orders </span>
                                        <img src="{{asset('img/arrow_white.svg')}}" alt="Arrow Next">
                                    </div>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

