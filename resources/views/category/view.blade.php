@extends('layout.container')

@section('top-wrapper')
    <a href="/category/index">
        @include('partials.backbutton')
    </a>
    @include('partials.detailtxt')
    <div class="action">
        <a href="/category/destroy/{{ $category->id }}"><i class='bx bxs-trash'></i></a>
    </div>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-info">
            <h1>{{ $category->category }}</h1>
            <div class="times">
                <span>{{ $category->created_at->format('l') }}</span>
                <span>{{ $category->created_at->format('d M Y') }}</span>
                <span>{{ $category->created_at->format('h:i A') }}</span>
            </div>
        </div>
    </div>
    <div class="mid-content">
        <div class="frame">
            <div class="frame-section">
                Tipe
                <span class="bold">{{ $category->type }}</span>
            </div>
        </div>
        <div class="divider"><span>-</span></div>
        <div class="desc-box">
            <span class="bold">Keterangan</span>
            <div class="desc">
                {{ $category->desc }}
            </div>
        </div>
    </div>

    <div class="action-edit">
        <button id="openModal">Edit</button>
    </div>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <form action="/category/update/{{ $category->id }}" method="post">
                @csrf
                <h3>Edit Kategori</h3>
                <div class="form-group">
                    <input type="text" name="category" id="" placeholder="Nama kategori baru"
                        value="{{ $category->category }}" required>
                </div>
                <div class="form-group">
                    <div class="cover-radio-button">
                        <div class="radio-button" onclick="selectRadioButton('pemasukan_id', this)">
                            <label for="pemasukan_id">Pemasukan</label>
                            <input type="radio" name="type" hidden id="pemasukan_id" value="Pemasukan"
                                {{ $category->type == 'Pemasukan' ? 'checked' : '' }}>
                        </div>

                        <div class="radio-button" onclick="selectRadioButton('pengeluaran_id', this)">
                            <label for="pengeluaran_id">Pengeluaran</label>
                            <input type="radio" name="type" hidden id="pengeluaran_id" value="Pengeluaran"
                                {{ $category->type == 'Pengeluaran' ? 'checked' : '' }}>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="desc" placeholder="Tuliskan keterangan kategori" required>{{ $category->desc }}</textarea>
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
