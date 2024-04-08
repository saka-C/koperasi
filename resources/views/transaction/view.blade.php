@extends('layout.container')

@section('top-wrapper')
    @include('partials.backbutton')
    @include('partials.detailtxt')
    <div class="action">
        <a href="#"><i class='bx bxs-trash'></i></a>
    </div>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-info">
        <h1>Rp.100.000</h1>
        <div class="times">
            <span>Saturday</span>
            <span>20 April 2024</span>
            <span>10.20 PM</span>
        </div>
    </div>
</div>
<div class="mid-content">
    <div class="frame">
        <div class="frame-section">
            Tipe
            <span class="bold">Pemasukan</span>
        </div>
        <div class="frame-section">
            Ketegori
            <span class="bold">Belanja</span>
        </div>
        <div class="frame-section">
            Dompet
            <span class="bold">Cash</span>
        </div>
    </div>
    <div class="divider"><span>-</span></div>
    <div class="desc-box">
        <span class="bold">Keterangan</span>
        <div class="desc">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis accusantium vitae molestias corporis in ex voluptatem alias neque assumenda est.
        </div>
    </div>
</div>        
<div class="action-edit">
    <a href="#">Edit</a>
</div>
@endsection