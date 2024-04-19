<?php

namespace App\Http\Controllers;

use App\Exports\TransactionsExport;
use App\Helpers\WalletHelper;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    function index()
    {
        $month = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $wallet = Wallet::all();
        $category = Category::all();
        $transactions = Transaction::orderBy('dateTime', 'desc')->get();

        $formDate = null;
        $toDate = null;
        $monthSearch = null;
        $categorySearch = null;
        $walletSearch = null;
        $typeSearch = null;
        

        foreach ($transactions as $transaction) {
            $transaction->date = Carbon::parse($transaction->dateTime)->format('d M Y');
            $transaction->time  = Carbon::parse($transaction->dateTime)->format('h:i A');
        }

        foreach ($transactions as $transaction) {
            $transaction->amount = number_format($transaction->amount, 0, ',', '.');
        }

        Session::put('filtered_data', $transactions);

        return view('transaction.index', compact('transactions', 'formDate', 'toDate','walletSearch','categorySearch','typeSearch','monthSearch', 'wallet','category','month'));
    }

    public function search(Request $request)
    {
        $month = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $wallet = Wallet::all();
        $category = Category::all();

        $formDate = $request->formDate;
        $toDate = $request->toDate;
        $monthSearch = $request->month;
        $categorySearch = $request->category_id;
        $walletSearch = $request->wallet_id;
        $typeSearch = $request->type;

        $transactions = Transaction::query();

        if ($formDate && $toDate) {
            $transactions->whereBetween('dateTime', [$formDate, $toDate]);
        } elseif ($formDate) {
            $transactions->where('dateTime', '>=', $formDate);
        } elseif ($toDate) {
            $transactions->where('dateTime', '<=', $toDate);
        }

        if ($monthSearch) {
            $transactions->whereMonth('dateTime', $monthSearch);
        }

        if ($categorySearch) {
            $transactions->where('category_id', $categorySearch);
        }

        if ($walletSearch) {
            $transactions->where('wallet_id', $walletSearch);
        }

        if ($typeSearch) {
            $transactions->whereHas('category', function ($query) use ($typeSearch) {
                $query->where('type', $typeSearch);
            });
        }

        $transactions = $transactions->orderBy('dateTime', 'desc')->get();

        // Format tanggal, waktu, dan jumlah transaksi
        foreach ($transactions as $transaction) {
            $transaction->date = Carbon::parse($transaction->dateTime)->format('d M Y');
            $transaction->time  = Carbon::parse($transaction->dateTime)->format('h:i A');
            $transaction->amount = number_format($transaction->amount, 0, ',', '.');
        }

        Session::put('filtered_data', $transactions);
        return view('transaction.index', compact('transactions', 'formDate', 'toDate','walletSearch','categorySearch','typeSearch','monthSearch', 'wallet','category','month'));
    }


    function create()
    {
        $walletBalances = WalletHelper::calculateWalletBalances();
        return view('transaction.create', [
            'category' => Category::latest()->get(),
            'wallet' => Wallet::latest()->get(),
            'walletBalances' => $walletBalances
        ]);
    }

    function store(Request $request)
    {
        $transactionData = $request->validate([
            'transaction_name' => ['required'],
            'category_id' => ['required'],
            'wallet_id' => ['required'],
            'amount' => ['required', 'numeric'],
            'dateTime' => ['required', 'date'],
            'note' => ['required']
        ]);

        Transaction::create($transactionData);
        return redirect('/home')->with('success', 'Yay! Transaksi Berhasil di Tambahkan');
    }

    function show(Transaction $transaction)
    {
        $walletBalances = WalletHelper::calculateWalletBalances();
        $transaction->day = Carbon::parse($transaction->dateTime)->format('l');
        $transaction->date = Carbon::parse($transaction->dateTime)->format('d M Y');
        $transaction->time  = Carbon::parse($transaction->dateTime)->format('h:i A');

        return view('transaction.view', [
            'transaction' => $transaction,
            'wallet' => Wallet::all(),
            'category' => Category::all(),
            'walletBalances' => $walletBalances
        ]);
    }

    function update(Request $request, Transaction $transaction)
    {
        $transactionData = $request->validate([
            'transaction_name' => ['required'],
            'category_id' => ['required'],
            'wallet_id' => ['required'],
            'amount' => ['required', 'numeric'],
            'dateTime' => ['required', 'date'],
            'note' => ['required']
        ]);

        $transaction->update($transactionData);
        return redirect("/transaction/show/$transaction->id")->with('success', 'Yay! Transaksi Berhasil di Ubah');
    }

    function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect('/transaction/index')->with('success', 'Yay! Transaksi Berhasil di Hapus');
    }

    function exportToExcel()
    {
        $filteredData = Session::get('filtered_data');
        if ($filteredData->isNotEmpty()) {
            return Excel::download(new TransactionsExport($filteredData), 'transaction.xlsx');
        } else {
            return redirect('/transaction/index')->with('error', 'Belum ada data');
        }
    }
}
