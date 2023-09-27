<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="font-Poppins">
        @include('components.header')
        <main class="lg:mt-24 lg:w-8/12 mx-auto p-4">
            <div class="content ">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>