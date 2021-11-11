@extends("layouts.base")

@section("content")
    @include('includes.page_header',["title"=>"Add your house"])
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
                            <input type="text" class="form-control" id="house_title" name="house_title">
                            @error("name")
                            <div class="validation-fail">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="founded_year">Founded year</label>
                            <input type="number"  class="form-control" id="founded_year" name="founded_year" >
                            @error("founded_year")
                            <div class="validation-fail">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Description</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control" id="username"  name="description" placeholder="So, in my house you can..." >some text</textarea>
                        </div>
                        @error("description")
                        <div class="validation-fail">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="price">Estimated price</label>
                            <input type="text" class="form-control" id="price" placeholder="" name="price" >
                            @error("price")
                            <div class="validation-fail">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ft_price">Estimated price for foot</label>
                            <input type="text" class="form-control" id="ft_price" name="ft_price" placeholder="" >
                            @error("ft_price")
                            <div class="validation-fail">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address"  name="address" placeholder="1234 Main St">
                        @error("address")
                        <div class="validation-fail">{{$message}}</div>
                        @enderror
                    </div>
                    <hr class="mb-4">

                    <h4 class="mb-3">More info</h4>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="bedrooms_count">Beds count</label>
                            <input type="number" class="form-control"  id="bedrooms_count" name="bedrooms_count">

                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="showers_count">Showers count</label>
                            <input type="number" class="form-control" id="showers_count" name="showers_count">

                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="floors_count">Floors count</label>
                            <input type="number" class="form-control" id="floors_count" name="floors_count">

                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="garage_count">Garage count</label>
                            <input type="number" class="form-control" id="garage_count" name="garage_count">

                        </div>
                    </div>
                    <hr class="mb-4">

                    <h4 class="mb-3">Upload house photo</h4>
                    <div class="col mb-3">
                        @error("images")
                        <div class="validation-fail">{{$message}}</div>
                        @enderror
                        <div class="input_file">
                            <label for="file" class="file_label">
                                Select Your Files
                            </label>
                            <input type="file" id="file" id="photo_previews" name="image[]" multiple accept="image/png, image/gif, image/jpeg" />
                        </div>
                    </div>
                    <button class="btn btn-yellow" type="submit">
                        <div class="text-arrow">
                            <span class="text-arrow__item">Next</span>
                            <img src="../img/arrow_white.svg" alt="Arrow Next">
                        </div>
                    </button>
                </form>
            </div>
        </div>

    </div>


@endsection
