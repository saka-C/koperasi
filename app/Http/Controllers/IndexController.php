<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    function index()
    {
        // Keuangan
        $income = 'Pemasukan';
        $incomeAmount = Transaction::whereHas('category', function ($query) use ($income) {
            $query->where('type', $income);
        })->sum('amount');

        $outcome = 'Pengeluaran';
        $outcomeAmount = Transaction::whereHas('category', function ($query) use ($outcome) {
            $query->where('type', $outcome);
        })->sum('amount');

        $totalAmount = $incomeAmount - $outcomeAmount;
        $formatTotalAmount = number_format($totalAmount, 0, ',', '.');

        // Keuangan Perbulan
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $incomeMonth = Transaction::whereHas('category', function ($query) use ($income, $currentMonth, $currentYear) {
            $query->where('type', $income)->whereMonth('dateTime', $currentMonth)->whereYear('dateTime', $currentYear);
        })->sum('amount');
        $formatIncomeMonth = number_format($incomeMonth, 0, ',', '.');

        $outcomeMonth = Transaction::whereHas('category', function ($query) use ($outcome, $currentMonth, $currentYear) {
            $query->where('type', $outcome)->whereMonth('dateTime', $currentMonth)->whereYear('dateTime', $currentYear);
        })->sum('amount');
        $formatOutcomeMonth = number_format($outcomeMonth, 0, ',', '.');

        // Aktifitas Pemasukan dan Pengeluaran Terbesar Bulan Ini
        $categoryTotals = Transaction::select('category.category', 'category.type', DB::raw('SUM(transaction.amount) as total_amount'))
            ->join('category', 'transaction.category_id', '=', 'category.id')
            ->whereMonth('transaction.dateTime', $currentMonth)
            ->whereYear('transaction.dateTime', $currentYear)
            ->groupBy('category.category', 'category.type')
            ->get();

        $totalTransaction = $categoryTotals->sum('total_amount');

        $largestIncomeCategory = $categoryTotals->where('type', 'Pemasukan')->max('total_amount');

        $largestExpenseCategory = $categoryTotals->where('type', 'Pengeluaran')->max('total_amount');

        $largestIncomeCategoryName = $categoryTotals->where('type', 'Pemasukan')->where('total_amount', $largestIncomeCategory)->pluck('category')->first();

        $largestExpenseCategoryName = $categoryTotals->where('type', 'Pengeluaran')->where('total_amount', $largestExpenseCategory)->pluck('category')->first();

        //Persentasi Pemasukan & Pengeluaran
        if ($totalTransaction != 0) {
            if ($incomeMonth != 0) {
                $incomePercentage = round(($largestIncomeCategory / $incomeMonth) * 100);
            } else {
                $incomePercentage = 0;
            }

            if ($outcomeMonth != 0) {
                $expensePercentage = round(($largestExpenseCategory / $outcomeMonth) * 100);
            } else {
                $expensePercentage = 0;
            }
        } else {
            $incomePercentage = 0;
            $expensePercentage = 0;
        }

        $latestTransaction = Transaction::whereNotNull('dateTime')->orderBy('dateTime', 'desc')->take(4)->get();
        foreach ($latestTransaction as $lt) {
            $lt->date = Carbon::parse($lt->dateTime)->format('d M Y');
            $lt->time  = Carbon::parse($lt->dateTime)->format('h:i A');
        }

        // Dapatkan nama-nama kategori
        $categoryNames = Category::pluck('category', 'id');

        // Persentase Keterlibatan Setiap Kategori
        $categoryTotals = Transaction::select('category_id', DB::raw('SUM(amount) as total_amount'))
            ->groupBy('category_id')
            ->get();

        $totalTransaction = $categoryTotals->sum('total_amount');

        // Dapatkan informasi tipe kategori dari tabel 'category'
        $categoryTypes = Category::pluck('type', 'id');

        $percentagePerCategory = [];
        foreach ($categoryTotals as $categoryTotal) {
            $percentage = ($categoryTotal->total_amount / $totalTransaction) * 100;

            // Ambil tipe kategori berdasarkan id kategori dari hasil query
            $categoryType = $categoryTypes[$categoryTotal->category_id];

            // Tetapkan warna berdasarkan tipe kategori
            $color = ($categoryType === 'Pemasukan') ? '#C8EE43' : '#FD3C4A';

            $percentagePerCategory[$categoryTotal->category_id] = [
                'percentage' => round($percentage),
                'color' => $color
            ];
        }

        return view('dashboard', [
            'month' => date('M'),
            'totalAmount' => $formatTotalAmount,
            'incomeThisMonth' => $formatIncomeMonth,
            'outcomeThisMonth' => $formatOutcomeMonth,
            'largestIncomeCategory' => number_format($largestIncomeCategory, 0, ',', '.'),
            'largestExpenseCategory' => number_format($largestExpenseCategory, 0, ',', '.'),
            'largestIncomeCategoryName' => $largestIncomeCategoryName,
            'largestExpenseCategoryName' => $largestExpenseCategoryName,
            'incomePercentage' => $incomePercentage,
            'expensePercentage' => $expensePercentage,
            'latestTransaction' => $latestTransaction,
            'categoryNames' => $categoryNames,
            'percentagePerCategory' => $percentagePerCategory,
        ]);
    }
}
