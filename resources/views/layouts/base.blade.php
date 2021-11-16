
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <title>Real Estate</title>
    <script src="{{asset('/js/libs.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/libs.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}" />
</head>
<body>
@include("includes.header")
<main>
    @yield("content")
</main>
@include("includes.footer")

@stack("js")

</body>
</html>
