<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            @include('partials.backbutton')

            @yield('content')
        </div>
    </div>

{{-- <script src="{{ asset('/js/script.js')}}"></script> --}}
<script src="{{ asset('/js/view.js')}}"></script>
</body>
</html>