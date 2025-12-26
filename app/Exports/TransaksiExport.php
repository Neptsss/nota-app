<?php

namespace App\Exports;

use App\Models\transaksi;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransaksiExport implements FromView, ShouldAutoSize
{
    use Exportable;

    protected $filters;

    public function __construct( $filters)
    {
        $this->filters = $filters;
        // dd($filters);
    }


    public function view(): View
    {
        $transaksi = transaksi::filters($this->filters)->get();
        return view('transaksi.transaksi-export', [
            'transaksi' => $transaksi
        ]);
    }
}
