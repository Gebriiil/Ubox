<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Ubox - @yield('title') </title>

   @include('frontmodule::includes.css')

    @yield('seo')

</head>

<body>

@include('frontmodule::includes.nav')

@include('frontmodule::includes.header')


@yield('content')

@include('frontmodule::includes.footer')

@include('frontmodule::includes.js')

</body>

</html>
