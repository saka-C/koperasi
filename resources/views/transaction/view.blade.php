@extends('layout.container')

@section('top-wrapper')
    <a href="/transaction/index">
        @include('partials.backbutton')

    </a>
    @include('partials.detailtxt')
    <div class="action">
        <a href="/transaction/destroy/{{ $transaction->id }}"><i class='bx bxs-trash'></i></a>
    </div>
@endsection

@section('content')
    <div id="editModal" class="modal">
        <div class="modal-content">
            <form action="/transaction/update/{{ $transaction->id }}" method="post">
                @csrf
                <h3>Edit Transaksi</h3>
                <div class="form-group">
                    <input type="text" name="transaction_name" id="" placeholder="Nama transaksi"
                        value="{{ $transaction->transaction_name }}" required>
                </div>
                <div class="form-group">
                    <input type="number" name="amount" id="" placeholder="Jumlah" required
                        value="{{ $transaction->amount }}">
                </div>
                <div class="form-group">
                    <label for="wallet">Pilih dompet</label>
                    <button id="popupBtn">Wallet</button>
                </div>

                <div class="wallet-popup" style="z-index: 99">
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
                                    <span>
                                        @if (isset($walletBalances[$wal->id]))
                                            {{ $walletBalances[$wal->id] }}
                                        @else
                                            0
                                        @endif
                                    </span>
                                </div>
                                <input type="radio" name="wallet_id" hidden id="wallet_id{{ $wal->id }}"
                                    value="{{ $wal->id }}">
                            </div>
                        @empty
                            <div class="empty-value">
                                <span class="bold">Oppss!!</span>
                                <img src="{{ asset('/img/novalue.png') }}" alt="no value">
                                <span>Sepertinya kamu belum punya data ini <a href="/wallet/index">buat disini</a></span>
                            </div>
                        @endforelse

                        <div class="close" onclick="closeBtn()">
                            <span>Tutup</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <select name="category_id" id="">
                        @forelse ($category as $cat)
                            @if ($transaction->category_id == $cat->id)
                                <option selected value="{{ $cat->id }}">{{ $cat->category }} - {{ $cat->desc }} -
                                    {{ $cat->type }}</option>
                            @else
                                <option value="{{ $cat->id }}">{{ $cat->category }} - {{ $cat->desc }} -
                                    {{ $cat->type }}</option>
                            @endif
                        @empty
                            <option value="">Kategori Belum Tersedia!</option>
                        @endforelse
                    </select>
                </div>

                <div class="form-group">
                    <input type="datetime-local" name="dateTime" id="" placeholder="Tanggal"
                        value="{{ $transaction->dateTime }}" required>
                </div>

                <div class="form-group">
                    <textarea name="note" id="" cols="30" rows="10" placeholder="Catatan" required>{{ $transaction->note }}</textarea>
                </div>
                <div class="botom-modal">
                    <button class="close-modal" type="button">Tutup</a>
                        <button type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="content-info">
            <h1>Rp.{{ number_format($transaction->amount, 0, ',', '.') }}</h1>
            <div class="times">
                <span>{{ $transaction->day }}</span>
                <span>{{ $transaction->date }}</span>
                <span>{{ $transaction->time }}</span>
            </div>
        </div>
    </div>
    <div class="mid-content">
        <div class="frame">
            <div class="frame-section">
                Tipe
                <span class="bold">{{ $transaction->category->type }}</span>
            </div>
            <div class="frame-section">
                Ketegori
                <span class="bold">{{ $transaction->category->category }}</span>
            </div>
            <div class="frame-section">
                Dompet
                <span class="bold">{{ $transaction->wallet->wallet }}</span>
            </div>
        </div>
        <div class="divider"><span>-</span></div>
        <div class="desc-box">
            <span class="bold">Keterangan</span>
            <div class="desc">
                {{ $transaction->note }}
            </div>
        </div>
    </div>
    <div class="action-edit">
        <button id="openModal">Edit</button>
    </div>


    <script src="{{ asset('/js/modal.js') }}"></script>
@endsection
