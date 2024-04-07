@extends('layout.main')

@section('main-content')
<h3>Kategori</h3>

<div class="table-data">
    <div class="top-table">
        <span class="bold">Data Kategori</span>
    </div>

    <table>
        <thead>
            <tr>
                <td>Nama Kategori</td>
                <td>Keterangan</td>
                <td>Jenis</td>
                <td>Dibuat</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Salary</td>
                <td>Gaji bulanan kantor</td>
                <td>Pemasukan</td>
                <td class="date-column">19 Apr 2024 <span>10.15 PM</span></td>
                <td><a href="#">Lihat</a></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@section('right-content')
<div class="form-container">
    <h3>Tambah Kategori</h3>
    <form action="">
        <div class="form-group">
            <input type="text" placeholder="Nama kategori baru">
        </div>
        <div class="form-group">
            <div class="cover-radio-button">
                <div class="radio-button" onclick="selectRadioButton('pemasukan_id', this)">
                    <label for="pemasukan_id">Pemasukan</label>
                    <input type="radio" name="kategori" hidden id="pemasukan_id" value="pemasukan">
                </div>

                <div class="radio-button" onclick="selectRadioButton('pengeluaran_id', this)">
                    <label for="pengeluaran_id">Pengeluaran</label>
                    <input type="radio" name="kategori" hidden id="pengeluaran_id" value="pengeluaran">
                </div>
            </div>
        </div>
        <div class="form-group">
            <textarea name="" placeholder="Tuliskan keterangan kategori"></textarea>
        </div>
        <div class="form-group">
            <button type="submit">Tambahkan</button>
        </div>
    </form>
</div>
@endsection