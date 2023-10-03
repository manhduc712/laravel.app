<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

</head>

<body>
    <div class="font-Poppins">
        @include('components.header')
        <main class="justify-between items-center mx-auto lg:mt-[10vh] p-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
