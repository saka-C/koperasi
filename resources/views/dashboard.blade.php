@extends('layout.main')

@section('main-content')
    <h3>Dashboard</h3>

    <div class="top-section">
        <div class="card-total current">
            <div class="icon">
                <i class="ph-fill ph-wallet"></i>
            </div>
            <div class="balence">
                <span>Saldo Total</span>
                <span class="bold">Rp.{{ $totalAmount }}</span>

            </div>
        </div>

        <div class="card-total">
            <div class="icon">
                <i class='bx bx-arrow-to-bottom green'></i>
            </div>
            <div class="balence">
                <span>Pemasukan bulan ini</span>
                <span class="bold">Rp.{{ $incomeThisMonth }}</span>
            </div>
        </div>

        <div class="card-total">
            <div class="icon">
                <i class='bx bx-arrow-from-bottom red'></i>
            </div>
            <div class="balence">
                <span>Pengeluaran bulan ini</span>
                <span class="bold">Rp.{{ $outcomeThisMonth }}</span>
            </div>
        </div>
    </div>

    <div class="month-transaction">
        <div class="section-top-month">
            <span class="bold">Aktifitas bulan {{ $month }}</span>
            {{-- <a href="#">Detail Aktifitas<i class='bx bx-chevron-right'></i></a> --}}
        </div>
        <div class="section-mid-month">
            <div class="month-bar">
                <div class="earn-bar green" style="background-color: #C5EBAA;">
                    <span>{{ $incomePercentage }}%</span>
                </div>
                @if ($largestIncomeCategoryName != null)
                    <span class="info">Sebagian pemasukan terbesar mu adalah <span
                            class="bold">{{ $largestIncomeCategoryName }}</span></span>
                @else
                    <span class="info">Sebagian pemasukan terbesar mu adalah <span class="bold">Belum
                            Tersedia</span></span>
                @endif
            </div>
            <div class="month-bar">
                <div class="spen-bar red" style="background-color: #F2C18D;">
                    <span>{{ $expensePercentage }}%</span>
                </div>
                @if ($largestExpenseCategoryName != null)
                    <span class="info">Pengeluaran terbesar mu adalah kategori <span
                            class="bold">{{ $largestExpenseCategoryName }}</span></span>
                @else
                    <span class="info">Sebagian pemasukan terbesar mu adalah <span class="bold">Belum
                            Tersedia</span></span>
                @endif
            </div>
        </div>
        <div class="section-bottom-month">
            <div class="total-month green">
                <i class='bx bxs-chevron-up'></i>
                <span>Rp.{{ $largestIncomeCategory }}</span>
            </div>
            <div class="total-month red">
                <i class='bx bxs-chevron-down'></i>
                <span>Rp.{{ $largestExpenseCategory }}</span>
            </div>
        </div>
    </div>

    <div class="table-data">
        <div class="top-table">
            <span class="bold">Terbaru</span>
            <a href="/transaction/index">Lihat Semua <i class='bx bx-chevron-right'></i></a>
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
                @forelse ($latestTransaction as $lt)
                    <tr>
                        <td>{{ $lt->transaction_name }}</td>
                        <td>{{ $lt->category->category }}</td>
                        <td>Rp.{{ number_format($lt->amount, 0, ',', '.') }}</td>
                        <td>{{ $lt->wallet->wallet }}</td>
                        <td class="date-column">{{ $lt->date }}<span>{{ $lt->time }}</span></td>
                        <td><a href="/transaction/show/{{ $lt->id }}">Lihat</a></td>
                        @if ($lt->category->type == 'Pengeluaran')
                            <td class="indicator out">
                                <p>.</p>
                            </td>
                        @else
                            <td class="indicator in">
                                <p>.</p>
                            </td>
                        @endif
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
    <div class="top-right">
        <a href="/transaction/create">Transaksi Baru <i class='bx bx-plus'></i></a>
    </div>

    <div class="mid-section">
        <span class="bold">Statistik</span>
        @forelse($percentagePerCategory as $categoryId => $percentageData)
            <div class="bar-section">
                <div class="info">
                    <span>{{ $categoryNames[$categoryId] }}</span><span>{{ $percentageData['percentage'] }}%</span></div>
                <div class="bar">
                    <div class="level-bar"
                        style="background-color: {{ $percentageData['color'] }}; width: {{ $percentageData['percentage'] }}%;">
                        <p>.</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="bar-section">
                <div class="info"><span>Transaksi Belum Terjadi</span></div>
            </div>
        @endforelse
    </div>
@endsection
