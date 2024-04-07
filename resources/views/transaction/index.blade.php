@extends('layout.main')

@section('main-content')
<h3>Transaksi</h3>
<div class="table-data">
    <div class="top-table">
        <span class="bold">Data Transaksi</span>
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
        </tbody>
    </table>
</div>
@endsection

@section('right-content')
<div class="form-container">
    <h3>Mutasi transaksi</h3>
    <form action="">
        <div class="form-group">
            <fieldset>
                <legend>Mulai</legend>
                <input type="date" name="" id="">
            </fieldset>
        </div>

        <div class="form-group">
            <fieldset>
                <legend>Sampai</legend>
                <input type="date" name="" id="">
            </fieldset>
        </div>

        <div class="form-group">
            <button type="submit">Cek</button>
        </div>
    </form>
</div>

<div class="bottom-right">
    <a href="#"><i class='bx bx-cloud-download'></i>Unduh catatan mutasi</a>
</div>    
@endsection