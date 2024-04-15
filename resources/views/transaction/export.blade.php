<table id="transactionTable">
    <thead>
        <tr>
            <th>Nama Transaksi</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Sumber Dana</th>
            <th>Kategori</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $item)
            <tr>
                <td>{{ $item->transaction_name }}</td>
                <td>{{ $item->category->category }}</td>
                <td>Rp.{{ $item->amount }}</td>
                <td>{{ $item->wallet->wallet }}</td>
                <td class="date-column">
                    {{ $item->date }} <span>{{ $item->time }}</span>
                </td>
                <td>{{ $item->category->type }}</td>
            </tr>
        @endforeach
    </tbody>
</table>