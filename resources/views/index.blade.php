@extends('layout.main')

@section('main-content')
<h3>Dashboard</h3>

<div class="top-section">
    <div class="card-total current">
        <div class="icon">
            <i class="ph-fill ph-wallet"></i>
        </div>
        <div class="balence">
            <span>Saldo Total</span>
            <span class="bold">Rp.12.000.000</span>
        </div>
    </div>

    <div class="card-total">
        <div class="icon">
            <i class='bx bx-arrow-to-bottom green'></i>
        </div>
        <div class="balence">
            <span>Pemasukan hari ini</span>
            <span class="bold">Rp.12.000.000</span>
        </div>
    </div>

    <div class="card-total">
        <div class="icon">
            <i class='bx bx-arrow-from-bottom red'></i>
        </div>
        <div class="balence">
            <span>Pengeluaran hari ini</span>
            <span class="bold">Rp.12.000.000</span>
        </div>
    </div>
</div>

<div class="month-transaction">
    <div class="section-top-month">
        <span class="bold">Aktifitas bulan Maret</span>
        <a href="#">Detail Aktifitas<i class='bx bx-chevron-right' ></i></a>
    </div>
    <div class="section-mid-month">
        <div class="month-bar">
            <div class="earn-bar green" style="background-color: #C5EBAA;">
                <span>80%</span>
            </div>
            <span class="info">Sebagian pemasukan terbesar mu adalah <span class="bold">Salary</span></span>
        </div>
        <div class="month-bar">
            <div class="spen-bar red" style="background-color: #F2C18D;">
                <span>60%</span>
            </div>
            <span class="info">Pengeluaran terbesar mu adalah kategori <span class="bold">Entertain</span></span>
        </div>
    </div>
    <div class="section-bottom-month">
        <div class="total-month green">
            <i class='bx bxs-chevron-up' ></i>
            <span>Rp.100.000.000</span>
        </div>
        <div class="total-month red">
            <i class='bx bxs-chevron-down' ></i>
            <span>Rp.30.000.000</span>
        </div>
    </div>
</div>

<div class="table-data">
    <div class="top-table">
        <span class="bold">Terbaru</span>
        <a href="#">Lihat Semua <i class='bx bx-chevron-right' ></i></a>
    </div>

    <table>
        <thead>
            <tr>
                <td>Nama Transaksi</td>
                <td>Kategori</td>
                <td>Jumlah</td>
                <td>Sumber Dana</td>
                <td>Tanggal</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Langganan Netflix</td>
                <td>Entertain</td>
                <td>Rp.99.000</td>
                <td>Gopay</td>
                <td class="date-column">19 Apr 2024 <span>10.15 PM</span></td>
                <td><a href="#">Lihat</a></td>
                <td class="indicator out"><p>.</p></td>
            </tr>
            <tr>
                <td>Gaji Bulanan</td>
                <td>Salary</td>
                <td>Rp.5.000.000</td>
                <td>Cimbniaga</td>
                <td class="date-column">1 Apr 2024 <span>09.00 PM</span></td>
                <td><a href="#">Lihat</a></td>
                <td class="indicator in"><p>.</p></td>
            </tr>
            <tr>
                <td>Langganan Netflix</td>
                <td>Entertain</td>
                <td>Rp.99.000</td>
                <td>Gopay</td>
                <td class="date-column">19 Apr 2024 <span>10.15 PM</span></td>
                <td><a href="#">Lihat</a></td>
                <td class="indicator out"><p>.</p></td>
            </tr>
            <tr>
                <td>Gaji Bulanan</td>
                <td>Salary</td>
                <td>Rp.5.000.000</td>
                <td>Cimbniaga</td>
                <td class="date-column">1 Apr 2024 <span>09.00 PM</span></td>
                <td><a href="#">Lihat</a></td>
                <td class="indicator in"><p>.</p></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@section('right-content')
<div class="top-right">
    <a href="/transaction/create">Transaksi Baru <i class='bx bx-plus' ></i></a>
</div>

<div class="mid-section">
    <span class="bold">Statistik</span>
    <div class="bar-section">
        <div class="info"><span>Salary</span><span>80%</span></div>
        <div class="bar">
            <div class="level-bar" style="background-color: #C8EE43; width: 80%;"><p>.</p></div>
        </div>
    </div>

    <div class="bar-section">
        <div class="info"><span>Entertain</span><span>80%</span></div>
        <div class="bar">
            <div class="level-bar" style="background-color: #FCAC12; width: 60%;"><p>.</p></div>
        </div>
    </div>
</div>
@endsection