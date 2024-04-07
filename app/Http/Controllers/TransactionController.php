<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    function index(){
        $transactions = Transaction::orderBy('dateTime', 'desc')->get();

        foreach ($transactions as $transaction) {
            $transaction->date = Carbon::parse($transaction->dateTime)->format('d M Y');
            $transaction->time  = Carbon::parse($transaction->dateTime)->format('h:i A');
        }

        foreach ($transactions as $transaction){
            $transaction->amount = number_format($transaction->amount, 0, ',','.');
        }

        return view('transaction.index', compact('transactions'));
    }

    function create(){
        return view('transaction.create',[
            'category' => Category::latest()->get(),
            'wallet' => Wallet::latest()->get()
        ]);
    }

    function store(Request $request){
        $transactionData = $request->validate([
            'transaction_name' => ['required'],
            'category_id' => ['required'],
            'wallet_id' => ['required'],
            'amount' => ['required', 'numeric'],
            'dateTime' => ['required', 'date'],
            'note' => ['required']
        ]);


        Transaction::create($transactionData);
        return redirect('/')->with('success','Yay! Transaksi Berhasil di Tambahkan');
    }
}
