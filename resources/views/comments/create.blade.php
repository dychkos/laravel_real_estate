@extends("layouts.base")

@section("content")
    @include('includes.page_header',["title"=>"Left your comment"])
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12 order-md-1">
                @if($errors->any())
                    <h4 class="validation-fail">Oop, you doesn`t fill all required fields</h4>
                @endif
                <form class="needs-validation" method="post" id="create_post" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col mb-3">
                            <label for="house_title">Your name</label>
                            <input type="text" class="form-control" id="house_title" value="{{\Illuminate\Support\Facades\Auth::user()->name ?? ""}}" name="author_name">
                            @error("author_name")
                            <div class="validation-fail">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Message</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control" name="author_message" placeholder="I really happy to say ..." >
                                {{old("author_message")}}
                            </textarea>
                        </div>
                        @error("author_message")
                        <div class="validation-fail">{{$message}}</div>
                        @enderror
                    </div>
                        <div class="col mb-4">
                            <h5 class="mb-3">Please, upload your photo</h5>
                            <div class="col mb-3">
                                <div class="input_file">
                                    <label for="file_input" class="file_label">
                                        Choose photo
                                    </label>
                                    <input type="file" id="file_input" name="image"  accept="image/png, image/gif, image/jpeg" />
                                    @error("author_image")
                                    <div class="validation-fail">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    <button class="btn btn-yellow" type="submit">
                        <div class="text-arrow">
                            <span class="text-arrow__item">Next</span>
                            <img src="{{asset('img/arrow_white.svg')}}" alt="Arrow Next">
                        </div>
                    </button>

                </form>
            </div>
        </div>

    </div>


@endsection

@once
    @push("js")
        <script src="{{asset("js/houses/create.js")}}"></script>
        <script src="{{asset("js/components/fileInput.js")}}"></script>
    @endpush
@endonce
