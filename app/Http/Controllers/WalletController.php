<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\WalletHelper;

class WalletController extends Controller
{
    function index()
    {
        $walletBalances = WalletHelper::calculateWalletBalances();
        $type = null;
        return view('wallet.index', [
            'wallet' => Wallet::latest()->get(),
            'walletBalances' => $walletBalances,
            'type' => $type
        ]);
    }

    function short(Request $request){
        $walletBalances = WalletHelper::calculateWalletBalances();
        $type = $request->type;
        

        if ($type) {
            $wallet = Wallet::where('type', $type)->latest()->get();
            return view('wallet.index',[
                'wallet' => $wallet,
                'type' => $type,
                'walletBalances' => $walletBalances
            ]);
        }else{
            $wallet = Wallet::latest()->get();
            return view('wallet.index',[
                'wallet' => $wallet,
                'type' => $type,
                'walletBalances' => $walletBalances
            ]);
        }
    }

    function store(Request $request)
    {
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

    function show(Wallet $wallet)
    {
        $walletBalances = WalletHelper::calculateWalletBalances();
        return view('wallet.view', [
            'wallet' => $wallet,
            'walletBalances' => $walletBalances
        ]);
    }

    function update(Request $request, Wallet $wallet)
    {
        $walletData = $request->validate([
            'wallet' => ['required'],
            'type' => ['required'],
        ]);
        if ($request->wallet != $wallet->wallet || $request->type != $wallet->type) {
            $cek_wallet = Wallet::firstOrNew($walletData);
            if ($cek_wallet->exists) {
                return back()->with('error', 'Opps! Dompet Telah Tersedia');
            }
        }
        $wallet->update($walletData);
        return redirect("/wallet/show/$wallet->id")->with('success','Yay! Dompet Berhasil di Ubah');
    }

    function destroy(Wallet $wallet){
        $cek_transaksi = Transaction::where('wallet_id', $wallet->id)->first();
        if (Transaction::where('wallet_id', $wallet->id)->exists()) {
            return back()->with('error', 'Opps! Dompet Exist di Menu Transaksi');
        } else {
            $wallet->delete();
            return redirect('/wallet/index')->with('success', 'Yay! Dompet Berhasil di Hapus');
        }
    }
}
