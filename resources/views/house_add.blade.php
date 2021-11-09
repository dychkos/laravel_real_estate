<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Add house</title>
</head>
<body class="bg-light">

<div class="container">
    <div class="py-5 text-center">
        <h1>Add your house</h1>
        <p class="lead">Fill form to add your house in market place</p>
    </div>

    <div class="row">

        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" method="post" enctype='multipart/form-data'>
                @csrf
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="house_title">House title</label>
                        <input type="text" class="form-control" id="house_title" value="Fluid Web" name="house_title" "">
                        @error("name")
                            <div class="small text-danger">{{$message}}</div>
                        @enderror

                    </div>
                    <div class="col-6 mb-3">
                        <label for="founded_year">Founded year</label>
                        <input type="number"  class="form-control" id="founded_year" name="founded_year" value="2000" "">
                        @error("founded_year")
                        <div class="small text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username">Description</label>
                    <div class="input-group">
                        <textarea type="text" class="form-control" id="username"  name="description" placeholder="So, in my house you can..."  "">some text</textarea>
                        @error("description")
                        <div class="small text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="price">Estimated price</label>
                        <input type="text" class="form-control" id="price" placeholder="" name="price" value="500000" "">
                        @error("price")
                        <div class="small text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="ft_price">Estimated price for foot</label>
                        <input type="text" class="form-control" id="ft_price" name="ft_price" placeholder="" value="3400" "">
                        @error("ft_price")
                        <div class="small text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" value="1234 Main St" name="address" placeholder="1234 Main St" "">
                    @error("address")
                    <div class="small text-danger">{{$message}}</div>
                    @enderror
                </div>
                <hr class="mb-4">

                <h4 class="mb-3">More info</h4>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="bedrooms_count">Beds count</label>
                        <input type="number" class="form-control"  value="2" id="bedrooms_count" name="bedrooms_count">

                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="showers_count">Showers count</label>
                        <input type="number" class="form-control" value="3" id="showers_count" name="showers_count">

                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="floors_count">Floors count</label>
                        <input type="number" class="form-control" value="3" id="floors_count" name="floors_count">

                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="garage_count">Garage count</label>
                        <input type="number" class="form-control" value="1" id="garage_count" name="garage_count">

                    </div>
                </div>
                <hr class="mb-4">

                <h4 class="mb-3">Upload house photo</h4>
                <div class="col mb-3">
                    @error("images")
                    <div class="small text-danger">{{$message}}</div>
                    @enderror
                    <input type="file" class="form-control" id="photo_previews" name="image[]" multiple accept="image/png, image/gif, image/jpeg" />
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2021 Real Estate</p>
    </footer>

</div>




<div id="wt-sky-root"></div>
</body>
</html>
