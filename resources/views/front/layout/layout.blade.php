<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
     @include('front.layout.styles')
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">


</head>

<body>
     
@include('front.layout.header')

@yield('content')

@include('front.layout.footer')

@include('front.layout.scripts')

</body>

</html>