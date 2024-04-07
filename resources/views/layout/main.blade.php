<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>Koperasi SMKN 1 CIBINONG</title>
</head>
<body>
    <div class="sidebar">
        <button class="hamburger" id="hamburger">☰</button>
        <div class="logo">
            <img src="{{asset('/img/logo.png')}}" alt="">
        </div>
        <nav>
            <a href="/"><i class='bx bx-tachometer'></i><span>Dashboard</span></a>
            <a href="/category/index"><i class='bx bx-category'></i><span>Kategori</span></a>
            <a href="/wallet/index"><i class="ph-bold ph-wallet"></i><span>Dompet</span></a>
            <a href="/transaction/index"><i class="ph-bold ph-receipt"></i><span>Transaksi</span></a>
            <a href="#"><i class='bx bx-log-out' ></i><span>Logout</span></a>
        </nav>
    </div>

    <div class="content">
        <div class="main-content">
            @yield('main-content')
        </div>
        <div class="right-content">
            @yield('right-content')
        </div>
    </div>

    
<script src="{{ asset('/js/script.js')}}"></script>
</body>
</html>