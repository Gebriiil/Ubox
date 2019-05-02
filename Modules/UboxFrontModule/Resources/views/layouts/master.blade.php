<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Ubox - @yield('title') </title>

   @include('uboxfrontmodule::includes.css')

    @yield('seo')

</head>

<body>

@include('uboxfrontmodule::includes.nav')

@include('uboxfrontmodule::includes.header')


@yield('content')

@include('uboxfrontmodule::includes.footer')

@include('uboxfrontmodule::includes.js')

</body>

</html>
