@extends("layouts.base")

@section("content")
    @include('includes.page_header',["title"=>"Change info"])
    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <form action="{{route("user.update")}}" method="POST" class="login-form"  enctype="multipart/form-data">
                        @csrf
                        <div class="login-form__item">
                            @error("name")
                            <div class="validation-fail">{{$message}}</div>
                            @enderror
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{$user->name}}" id="name">
                        </div>

                        <div class="login-form__item">
                            @error("images")
                            <div class="validation-fail">{{$message}}</div>
                            @enderror
                            <div class="input_file">
                                <label for="file_input" class="file_label">
                                    Download profile photo
                                </label>
                                <input id="file_input" type="file" name="image" accept=".png, .jpg, .jpeg" />
                            </div>
                        </div>

                        <div class="login-form__footer">
                            <div class="login-form__item">
                                <button type="submit" class="btn btn-yellow">
                                    <div class="text-arrow">
                                        <span class="text-arrow__item">Save</span>
                                        <img src="{{asset("img/arrow_white.svg")}}" alt="Arrow Next">
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection


@once
    @push("js")
        <script src="{{asset("js/libs/Select.js")}}"></script>
        <script src="{{asset("js/components/fileInput.js")}}"></script>
    @endpush
@endonce


