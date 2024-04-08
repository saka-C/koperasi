@extends('layout.app')

@section('pages')
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
@endsection
