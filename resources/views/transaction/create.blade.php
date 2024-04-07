@extends('layout.container')

@section('content')
<div class="form-container">
    <form action="">
        <div class="top-form">
            <span class="bold">Transaksi Baru</span>
            <div class="form-group">
                <label for="">Nama transaksi</label>
                <input type="text">
            </div>
            <div class="form-group">
                <label for="">Jumlah</label>
                <input type="number">
            </div>
            <div class="form-group">
                <label for="wallet">Pilih dompet</label>
                <button id="popupBtn">Wallet</button>
            </div>

            <div class="wallet-popup">
                <div class="wallet-popup-content">
                    <div class="radio-wallet-option" onclick="selectRadioButton('wallet_id', this)">
                        <div class="wallet-type">
                            <i class='bx bxs-credit-card' ></i>
                        </div>
                        <div class="wallet-option">
                            <span>ATM</span>
                            <span class="text">20.000.000</span>
                        </div>
                        <input type="radio" name="walletoption" hidden id="wallet_id" value="wallet">
                    </div>

                    <div class="radio-wallet-option" onclick="selectRadioButton('wallet_id2', this)">
                        <div class="wallet-type">
                            <i class='bx bxs-wallet'></i>
                        </div>
                        <div class="wallet-option">
                            <span>Cash</span>
                            <span class="text">20.000.000</span>
                        </div>
                        <input type="radio" name="walletoption" hidden id="wallet_id2" value="wallet">
                    </div>

                    <div class="close" onclick="closeBtn()">
                        <span>Tutup</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="category">Kateogri</label>
                <select name="" id="">
                    <option value="#">Salary</option>
                    <option value="#">Entertain</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date">Tanggal</label>
                <input type="date" name="" id="">
            </div>

            <div class="form-group">
                <label for="note">Catatan</label>
                <textarea name="" id="" cols="30" rows="10"></textarea>
            </div>
        </div>

        <div class="form-group">
            <button type="submit">Tambah</button>
        </div>
    </form>
</div>
@endsection