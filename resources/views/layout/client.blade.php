<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @include('layout.clientcss')

</head>

<body>
    <div class="page-content">
        @include('layout.sidebar')
        @yield('content')
    </div>
    @include('layout.clientscripts')
</body>

</html>
