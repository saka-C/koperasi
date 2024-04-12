@extends('layout.container')

@section('top-wrapper')
    <a href="/wallet/index">
        @include('partials.backbutton')
    </a>
    @include('partials.detailtxt')
    <div class="action">
        <a href="/wallet/destroy/{{ $wallet->id }}"><i class='bx bxs-trash'></i></a>
    </div>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-info">
            <h1>{{ $wallet->wallet }}</h1>
            <div class="times">
                <span>{{ $wallet->created_at->format('l') }}</span>
                <span>{{ $wallet->created_at->format('d M Y') }}</span>
                <span>{{ $wallet->created_at->format('h:i A') }}</span>
            </div>
        </div>
    </div>
    <div class="mid-content">
        <div class="frame">
            <div class="frame-section">
                Saldo
                <span class="bold">Rp.{{ $walletBalances[$wallet->id] }}</span>
            </div>
        </div>
        <div class="divider"><span>-</span></div>
        <div class="desc-box">
            <span class="bold">Keterangan</span>
            <div class="desc">
                {{ $wallet->type }}
            </div>
        </div>
    </div>
    <div class="action-edit">
        <button id="openModal">Edit</button>
    </div>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <form action="/wallet/update/{{ $wallet->id }}" method="post">
                @csrf
                <h3>Edit Kategori</h3>
                <input type="number" name="id" id="" value="{{ $wallet->id }}" hidden>
                <div class="form-group">
                    <input type="text" name="wallet" id="" placeholder="Nama kategori baru"
                        value="{{ $wallet->wallet }}" required>
                </div>
                <div class="form-group">
                    <div class="cover-radio-button">
                        <div class="radio-button" onclick="selectRadioButton('tunai_id', this)">
                            <i class="ph-bold ph-money-wavy"></i>
                            <label for="tunai_id">Tunai</label>
                            <input type="radio" name="type" hidden id="tunai_id" value="Tunai"
                                {{ $wallet->type == 'Tunai' ? 'checked' : '' }}>
                        </div>

                        <div class="radio-button" onclick="selectRadioButton('nontunai_id', this)">
                            <i class='bx bx-credit-card'></i>
                            <label for="nontunai_id">Non-tunai</label>
                            <input type="radio" name="type" hidden id="nontunai_id" value="Non Tunai"
                                {{ $wallet->type == 'Non Tunai' ? 'checked' : '' }}>
                        </div>
                    </div>
                </div>
                <div class="botom-modal">
                    <button class="close-modal" type="button">Tutup</button>
                    <button type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('/js/modal.js') }}"></script>
@endsection
