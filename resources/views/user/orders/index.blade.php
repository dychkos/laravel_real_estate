@extends("layouts.base")

@section("content")
    @include('includes.page_header',["title"=>"Order list"])
    <section class="orders">
        <div class="container">
            @if(empty($orders))
                                <div class="order order_empty card">
                    <div class="order__image" >
                        <img src="{{asset("img/empty_order.png")}}" alt="Empty order">
                        <h4>Opps, you order list is empty</h4>
                    </div>
                </div>
            @else
                <div class="card">
                    @foreach($orders as $order)
                        <div class="order">
                            <div class="order__body">
                                <div class="row">
                                    <div class="order__items row row-cols-1 row-cols-xl-5">
                                        <div class="order__item order__item_mix">
                                            <img src="{{asset("storage/".$order->house->images()->first()->filename)}}" alt="Order">
                                            <span>{{$order->customer_name}}</span>
                                        </div>
                                        <div class="order__item"><span>{{$order->customer_email}}</span></div>
                                        <div class="order__item"><span>{{$order->customer_phone}}</span></div>
                                        <div class="order__item"><span>{{$order->created_at->diffForHumans()}}</span></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="order__item order__item_text">
                                        <p>{{$order->customer_message}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="order__action">
                                <img class="arrow-down"  src="{{asset("img/arrow_down.svg")}}" alt="Arrow down">
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

@endsection


@once
    @push("js")
        <script src="{{asset("js/orders/main.js")}}"></script>
    @endpush
@endonce

