<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    function index(){
        return view('wallet.index',[
            'wallet' => Wallet::latest()->get()
        ]);
    }

    function store(Request $request){
        $walletData = $request->validate([
            'wallet' => ['required'],
            'type' => ['required'],
        ]);

        $wallet = Wallet::firstOrNew($walletData);

        if ($wallet->exists) {
            return back()->with('error', 'Opps! Dompet Telah Tersedia');
        } else {
            Wallet::create($walletData);
            return back()->with('success', 'Yay! Dompet Berhasil di Tambahkan');
        }
    }
}
