<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        return view('chart.index');
    }

    public function getByType(Request $request)
    {
        $type = $request->input('type');

        $transactions = Transaction::with('category')
            ->whereHas('category', function ($query) use ($type) {
                $query->where('type', $type);
            })
            ->get();

        return response()->json($transactions);
    }
}
