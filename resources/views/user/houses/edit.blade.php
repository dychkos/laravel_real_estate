@extends("layouts.base")

@section("content")
    @include('includes.page_header',["title"=>"Edit house info"])
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12 order-md-1">
                @if($errors->any())
                    <h4 class="validation-fail">Oop, you doesn`t fill all required fields</h4>
                @endif
                <h4 class="mb-3">House info</h4>
                <form class="needs-validation" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="house_title">House title</label>
                            <input type="text" class="form-control" id="house_title" value="{{$house->name}}" name="house_title">
                            @error("name")
                            <div class="validation-fail">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="founded_year">Founded year</label>
                            <input type="number"  class="form-control" id="founded_year" value="{{$house->founded_year}}" name="founded_year" >
                            @error("founded_year")
                            <div class="validation-fail">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Description</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control" rows="10" id="username" name="description" >
                              {{$house->description}}
                            </textarea>
                        </div>
                        @error("description")
                        <div class="validation-fail">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="price">Estimated price</label>
                            <input type="text" class="form-control" id="price" placeholder=""  value="{{$house->price}}" name="price" >
                            @error("price")
                            <div class="validation-fail">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ft_price">Estimated price for foot</label>
                            <input type="text" class="form-control" id="ft_price"  value="{{$house->ft_price}}" name="ft_price" placeholder="" >
                            @error("ft_price")
                            <div class="validation-fail">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" value="{{$house->address}}"  name="address" placeholder="1234 Main St">
                        @error("address")
                        <div class="validation-fail">{{$message}}</div>
                        @enderror
                    </div>
                    <hr class="mb-4">

                    <h4 class="mb-3">More info</h4>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="bedrooms_count">Beds count</label>
                            <input type="number" class="form-control"  value="{{$house->bedrooms_count}}"  id="bedrooms_count" name="bedrooms_count">

                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="showers_count">Showers count</label>
                            <input type="number" class="form-control" value="{{$house->showers_count}}" id="showers_count" name="showers_count">

                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="floors_count">Floors count</label>
                            <input type="number" class="form-control" value="{{$house->floors_count}}" id="floors_count" name="floors_count">

                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="garage_count">Garage count</label>
                            <input type="number" class="form-control" value="{{$house->garage_count}}" id="garage_count" name="garage_count">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-4">
                            <h4 class="mb-3">Select house features</h4>
                            <div class="dropdown dropdown_multyselect dropdown_bordered">
                                <div class="dropdown__backdrop" data-type="backdrop" ></div>
                                <div class="dropdown__header">
                                    <div class="dropdown__title">
                                        @if($house->features()->get()->isNotEmpty())
                                            @foreach($house->features as $feature)
                                                <span class="dropdown__multy">
                                                    {{$feature->title}}
                                                    <input type="hidden" name="feature[]" value=" {{$feature->id}}">
                                                </span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="dropdown__arrow">
                                        <img src="{{asset("img/arrow_down.svg")}}" alt="Arrow down">
                                    </div>
                                </div>
                                <div class="dropdown__body">
                                    @foreach($features as $feature)
                                        <div class="dropdown__item" data-type="item" data-id="{{$feature->id}}">{{$feature->title}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="col mb-4">
                            <h4 class="mb-3">Upload house photo</h4>
                            <div class="col mb-3">
                                <div class="input_file">
                                    <label for="file_input" class="file_label">
                                        Select Your Files
                                    </label>
                                    <input type="file" id="file_input" name="image[]" multiple accept="image/png, image/gif, image/jpeg" />
                                    @error("images")
                                    <div class="validation-fail">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-yellow" type="submit">
                        <div class="text-arrow">
                            <span class="text-arrow__item">Next</span>
                            <img src="{{asset("img/arrow_white.svg")}}" alt="Arrow Next">
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>


@endsection


@once
    @push("js")
        <script src="{{asset("js/libs/Select.js")}}"></script>
        <script src="{{asset("js/houses/create.js")}}"></script>
        <script>
            let selected = @json($house->features);
            selected = selected.map(sel=>{
                return {id:sel.id,value:sel.title}
            });
            multySelect.selected = selected;
        </script>
    @endpush
@endonce

