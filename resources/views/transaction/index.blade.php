@extends('layout.main')

@section('main-content')
    <h3>Transaksi</h3>
    <div class="table-data">
        <div class="top-table">
            <span class="bold">Data Transaksi</span>
            <div class="short-data">
                <span class="bold">Short by:</span>
                <select name="" id="">
                    <option value="" disabled selected>type</option>
                    <option value="">Pemasukan</option>
                    <option value="">Pengeluaran</option>
                </select>
                <select name="" id="">
                    <option value="" disabled selected>wallet</option>
                </select>
                <select name="" id="">
                    <option value="" disabled selected>category</option>
                </select>
            </div>
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
                @forelse ($transactions as $item)
                    <tr>
                        <td>{{ $item->transaction_name }}</td>
                        <td>{{ $item->category->category }}</td>
                        <td>Rp.{{ $item->amount }}</td>
                        <td>{{ $item->wallet->wallet }}</td>
                        <td class="date-column">
                            {{ $item->date }}<span>{{ $item->time }}</span></td>
                        <td><a href="/transaction/show/{{ $item->id }}">Lihat</a></td>
                        @if ($item->category->type == 'Pengeluaran')
                            <td class="indicator out">
                            @else
                            <td class="indicator in">
                        @endif
                        <p>.</p>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="9" align="center">Belum Terjadi Transaksi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('right-content')
    <div class="form-container">
        <h3>Mutasi transaksi</h3>
        <form action="/transaction/search" method="post">
            @csrf
            <div class="form-group">
                <fieldset>
                    <legend>Mulai</legend>
                    <input type="date" name="formDate" id="" >
                </fieldset>
            </div>

            <div class="form-group">
                <fieldset>
                    <legend>Sampai</legend>
                    <input type="date" name="toDate" id="" >
                </fieldset>
            </div>

            <div class="form-group">
                <button type="submit">Cek</button>
            </div>
        </form>
    </div>

    @if (isset($transactions))
    <div class="bottom-right">
        <a href="{{ route('transaction.export', ['formDate' => $formDate, 'toDate' => $toDate]) }}"><i class='bx bx-cloud-download'></i>Unduh catatan mutasi</a>
    </div>
    @endif
@endsection
