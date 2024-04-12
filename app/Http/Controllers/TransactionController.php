<?php

namespace App\Http\Controllers;

use App\Helpers\WalletHelper;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    function index()
    {
        $transactions = Transaction::orderBy('dateTime', 'desc')->get();

        foreach ($transactions as $transaction) {
            $transaction->date = Carbon::parse($transaction->dateTime)->format('d M Y');
            $transaction->time  = Carbon::parse($transaction->dateTime)->format('h:i A');
        }

        foreach ($transactions as $transaction) {
            $transaction->amount = number_format($transaction->amount, 0, ',', '.');
        }

        return view('transaction.index', compact('transactions'));
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
        return redirect('/')->with('success', 'Yay! Transaksi Berhasil di Tambahkan');
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

    function update(Request $request,Transaction $transaction)
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

    function destroy(Transaction $transaction){
        $transaction->delete();
        return redirect('/transaction/index')->with('success','Yay! Transaksi Berhasil di Hapus');
    }
}
