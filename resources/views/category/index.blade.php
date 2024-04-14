@extends('layout.main')

@section('main-content')
    <h3>Kategori</h3>

    <div class="table-data">
        <div class="top-table">
            <span class="bold">Data Kategori</span>
        </div>

        <table>
            <thead>
                <tr>
                    <td>Nama Kategori</td>
                    <td>Keterangan</td>
                    <td>Jenis</td>
                    <td>Dibuat</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($category as $item)
                    <tr>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->desc }}</td>
                        <td>{{ $item->type }}</td>
                        <td class="date-column">{{ $item->created_at->format('d M Y') }}<span>{{ $item->created_at->format('h:i A') }}</span></td>
                        <td class="bubble-action-column">
                            <button class="action-button"><i class='bx bxs-cog'></i></button>
                            <div class="bubble-action">
                                <a href="/category/show/{{ $item->id }}">lihat</a>
                                <br>
                                <a href="#" class="out">Hapus</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" align="center">Kategori Belum Tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="{{asset('/js/actionBtn.js')}}"></script>
@endsection

@section('right-content')
    <div class="form-container">
        <h3>Tambah Kategori</h3>
        <form action="/category/store" method="post">
            @csrf
            <div class="form-group">
                <input type="text" placeholder="Nama kategori baru" name="category" required>
            </div>
            <div class="form-group">
                <div class="cover-radio-button">
                    <div class="radio-button" onclick="selectRadioButton('pemasukan_id', this)">
                        <label for="pemasukan_id">Pemasukan</label>
                        <input type="radio" name="type" hidden id="pemasukan_id" value="Pemasukan">
                    </div>

                    <div class="radio-button" onclick="selectRadioButton('pengeluaran_id', this)">
                        <label for="pengeluaran_id">Pengeluaran</label>
                        <input type="radio" name="type" hidden id="pengeluaran_id" value="Pengeluaran">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <textarea name="desc" placeholder="Tuliskan keterangan kategori" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Tambahkan</button>
            </div>
        </form>
    </div>
@endsection
