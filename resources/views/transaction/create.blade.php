@extends('layout.container')

@section('top-wrapper')
    @include('partials.backbutton')
@endsection

@section('content')
    <div class="form-container">
        <form action="/transaction/store" method="post">
            @csrf
            <div class="top-form">
                <span class="bold">Transaksi Baru</span>
                <div class="form-group">
                    <label for="transaction_name">Nama transaksi</label>
                    <input type="text" name="transaction_name" required>
                </div>
                <div class="form-group">
                    <label for="amount">Jumlah</label>
                    <input type="number" name="amount" required>
                </div>
                <div class="form-group">
                    <label for="wallet">Pilih dompet</label>
                    <button id="popupBtn">Wallet</button>
                </div>

                <div class="wallet-popup">
                    <div class="wallet-popup-content">
                        @forelse ($wallet as $wal)
                            <div class="radio-wallet-option"
                                onclick="selectRadioButton('wallet_id{{ $wal->id }}', this)">
                                <div class="wallet-type">
                                    @if ($wal->type == 'Tunai')
                                        <i class='bx bxs-wallet'></i>
                                    @else
                                        <i class='bx bxs-credit-card'></i>
                                    @endif
                                </div>
                                <div class="wallet-option">
                                    <span>{{ $wal->wallet }}</span>
                                    <span>{{ $wal->amount }}</span>
                                </div>
                                <input type="radio" name="wallet_id" hidden id="wallet_id{{ $wal->id }}"
                                    value="{{ $wal->id }}" required>
                            </div>
                        @empty
                            <div class="empty-value">
                                <span class="bold">Oppss!!</span>
                                <img src="{{asset('/img/novalue.png')}}" alt="no value">
                                <span>Sepertinya kamu belum punya data ini <a href="/wallet/index">buat disini</a></span>
                            </div>
                        @endforelse

                        <div class="close" onclick="closeBtn()">
                            <span>Tutup</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="category">Kateogri</label>
                    <select name="category_id" id="">
                        <option value="" selected>Pilih Kategory</option>
                        @forelse ($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->category }} - {{ $cat->desc }} -
                                {{ $cat->type }}</option>
                        @empty
                            <option value="">Kategori Belum Tersedia!</option>
                        @endforelse
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">Tanggal</label>
                    <input type="datetime-local" name="dateTime" id="" required>
                </div>

                <div class="form-group">
                    <label for="note">Catatan</label>
                    <textarea name="note" id="" cols="30" rows="10" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <button type="submit">Tambah</button>
            </div>
        </form>
    </div>
@endsection
