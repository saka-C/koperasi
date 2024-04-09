<?php

namespace App\Helpers;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use App\Models\Wallet;

class WalletHelper
{
    public static function calculateWalletBalances()
    {
        $wallets = Wallet::latest()->get();

        $totalIncomeWallet = Transaction::whereHas('category', function ($query) {
            $query->where('type', 'Pemasukan');
        })->select('wallet_id', DB::raw('SUM(amount) as total_income'))->groupBy('wallet_id')->get();

        $totalExpenseWallet = Transaction::whereHas('category', function ($query) {
            $query->where('type', 'Pengeluaran');
        })->select('wallet_id', DB::raw('SUM(amount) as total_expense'))->groupBy('wallet_id')->get();

        $walletBalances = [];
        foreach ($wallets as $wallet) {
            $totalIncome = $totalIncomeWallet->where('wallet_id', $wallet->id)->sum('total_income');
            $totalExpense = $totalExpenseWallet->where('wallet_id', $wallet->id)->sum('total_expense');
            $balance = number_format($totalIncome - $totalExpense, 0, ',', '.');
            $walletBalances[$wallet->id] = $balance;
        }

        return $walletBalances;
    }
}
