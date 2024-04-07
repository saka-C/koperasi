@extends('layout.main')

@section('main-content')
    <h3>Dompet</h3>

    <div class="table-data">
        <div class="top-table">
            <span class="bold">Data Dompet</span>
        </div>

        <table>
            <thead>
                <tr>
                    <td>Nama dompet</td>
                    <td>Jenis</td>
                    <td>Saldo awal</td>
                    <td>Dibuat</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($wallet as $item)
                    <tr>
                        <td>{{ $item->wallet }}</td>
                        <td>{{ $item->type }}</td>
                        <td>-</td>
                        <td class="date-column">{{ $item->created_at->format('d M Y') }}<span>{{ $item->created_at->format('h:i A') }}</span></td>
                        <td><a href="#">Lihat</a></td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('right-content')
    <div class="form-container">
        <h3>Tambah Dompet</h3>
        <form action="/wallet/store" method="post">
            @csrf
            <div class="form-group">
                <input type="text" placeholder="Nama kategori baru" name="wallet" required>
            </div>
            <div class="form-group">
                <div class="cover-radio-button">
                    <div class="radio-button" onclick="selectRadioButton('tunai_id', this)">
                        <i class="ph-bold ph-money-wavy"></i>
                        <label for="tunai_id">Tunai</label>
                        <input type="radio" name="type" hidden id="tunai_id" value="Tunai">
                    </div>

                    <div class="radio-button" onclick="selectRadioButton('nontunai_id', this)">
                        <i class='bx bx-credit-card'></i>
                        <label for="nontunai_id">Non-tunai</label>
                        <input type="radio" name="type" hidden id="nontunai_id" value="Non Tunai">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="number" placeholder="Saldo awal anda">
            </div>
            <div class="form-group">
                <button type="submit">Tambahkan</button>
            </div>
        </form>
    </div>
@endsection
