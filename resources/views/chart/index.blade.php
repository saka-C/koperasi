@extends('layout.main')

@section('main-content')
    <h3>Statistik</h3>

    <canvas id="myChart" style="width:100%;"></canvas>
    
    <script src="{{asset('/js/chart.js')}}"></script>
@endsection

@section('right-content')
    <div class="form-container">
        <h3>Statistik Transaksi</h3>
        <form action="">
            <div class="form-group">
                <select name="" id="">
                    <option value="" disabled selected>Pilih jenis transaksi</option>
                </select>
            </div>
            <div class="form-group">
                <select name="" id="">
                    <option value="" disabled selected>Pilih kategori</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Tampilkan Dichart</button>
            </div>
        </form>
    </div>
@endsection