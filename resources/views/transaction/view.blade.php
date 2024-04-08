@extends('layout.container')

@section('top-wrapper')
    @include('partials.backbutton')
    @include('partials.detailtxt')
    <div class="action">
        <a href="#"><i class='bx bxs-trash'></i></a>
    </div>
@endsection

@section('content')
<div id="editModal" class="modal">
    <div class="modal-content">
      <form action="">
        <h3>Edit transasksi</h3>
        <div class="form-group">
            <input type="text" name="" id="" placeholder="Nama transaksi">
        </div>
        <div class="form-group">
            <input type="number" name="" id="" placeholder="Jumlah">
        </div>
        <div class="form-group">
            <label for="wallet">Pilih dompet</label>
            <button id="popupBtn">Wallet</button>
        </div>
        <div class="form-group">
            <select name="" id="">
                <option disabled selected>Kateogri</option>
                <option value="#">Salary</option>
                <option value="#">Entertain</option>
            </select>
        </div>

        <div class="form-group">
            <input type="date" name="" id="" placeholder="Tanggal">
        </div>

        <div class="form-group">
            <textarea name="" id="" cols="30" rows="10" placeholder="Catatan"></textarea>
        </div>
        <div class="botom-modal">
          <button class="close-modal">Tutup</button>
          <button type="submit">Simpan</button>
        </div>
      </form>
    </div>
</div>

<div class="content-wrapper">
    <div class="content-info">
        <h1>Rp.100.000</h1>
        <div class="times">
            <span>Saturday</span>
            <span>20 April 2024</span>
            <span>10.20 PM</span>
        </div>
    </div>
</div>
<div class="mid-content">
    <div class="frame">
        <div class="frame-section">
            Tipe
            <span class="bold">Pemasukan</span>
        </div>
        <div class="frame-section">
            Ketegori
            <span class="bold">Belanja</span>
        </div>
        <div class="frame-section">
            Dompet
            <span class="bold">Cash</span>
        </div>
    </div>
    <div class="divider"><span>-</span></div>
    <div class="desc-box">
        <span class="bold">Keterangan</span>
        <div class="desc">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis accusantium vitae molestias corporis in ex voluptatem alias neque assumenda est.
        </div>
    </div>
</div>        
<div class="action-edit">
    <button id="openModal">Edit</button>
</div>

<div class="wallet-popup" style="z-index: 99">
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

<script src="{{asset('/js/modal.js')}}"></script>
@endsection