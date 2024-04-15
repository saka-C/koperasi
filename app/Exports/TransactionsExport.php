<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class TransactionsExport implements FromView, WithEvents
{
    protected $transactions;

    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }

    public function view(): View
    {
        return view('transaction.export', [
            'transactions' => $this->transactions,
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Autofit kolom setelah semua data telah ditambahkan
                $event->sheet->autoSize();
            },
        ];
    }
}
