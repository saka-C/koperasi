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
                    <td>Saldo</td>
                    <td>Dibuat</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($wallet as $item)
                    <tr>
                        <td>{{ $item->wallet }}</td>
                        <td>{{ $item->type }}</td>
                        <td>Rp.
                        @if (isset($walletBalances[$item->id]))
                            {{ $walletBalances[$item->id] }}
                        @else
                            0
                        @endif
                        </td>
                        <td class="date-column">
                            {{ $item->created_at->format('d M Y') }}<span>{{ $item->created_at->format('h:i A') }}</span>
                        </td>
                        <td class="bubble-action-column">
                            <button class="action-button"><i class='bx bxs-cog'></i></button>
                            <div class="bubble-action">
                                <a href="/wallet/show/{{ $item->id }}">lihat</a>
                                <br>
                                <a href="/wallet/destroy/{{ $item->id }}" class="out">Hapus</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" align="center">Dompet Belum Tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="{{asset('/js/actionBtn.js')}}"></script>
@endsection

@section('right-content')
    <div class="form-container">
        <h3>Tambah Dompet</h3>
        <form action="/wallet/store" method="post">
            @csrf
            <div class="form-group">
                <input type="text" placeholder="Nama dompet baru" name="wallet" required>
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
                <button type="submit">Tambahkan</button>
            </div>
        </form>
    </div>
@endsection


