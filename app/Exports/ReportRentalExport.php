<?php

namespace App\Exports;

use App\Models\TransactionsRental;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportRentalExport implements FromCollection, WithHeadings
{
    protected $paymentStatus;
    protected $rentalStatus;
    protected $rentalStartDate;
    protected $rentalEndDate;

    public function __construct($paymentStatus, $rentalStatus, $rentalStartDate, $rentalEndDate)
    {
        $this->paymentStatus = $paymentStatus;
        $this->rentalStatus = $rentalStatus;
        $this->rentalStartDate = $rentalStartDate;
        $this->rentalEndDate = $rentalEndDate;
    }

    public function collection()
    {
        return TransactionsRental::with(['member', 'transportationRental'])
            ->when($this->paymentStatus, fn($q) => $q->where('paymentStatus', $this->paymentStatus))
            ->when($this->rentalStatus, fn($q) => $q->where('rentalStatus', $this->rentalStatus))
            ->when($this->rentalStartDate, fn($q) => $q->whereDate('rentalStartDate', '>=', $this->rentalStartDate))
            ->when($this->rentalEndDate, fn($q) => $q->whereDate('rentalStartDate', '<=', $this->rentalEndDate))->get()
            ->map(function ($item) {
                return [
                    $item->created_at,
                    $item->member->nik ?? '-',
                    $item->member->name ?? '-',
                    $item->transportationRental->transportation->transportation ?? '-',
                    $item->transportationRental->merk->merk,
                    $item->transportationRental->model,
                    $item->rentalStartDate . ' s/d ' . $item->rentalEndDate,
                    $item->paymentMethod,
                    $item->paymentStatus,
                    $item->rentalStatus,
                    $item->rentalCost,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'WAKTU TRANSAKSI',
            'KODE MEMBER',
            'MEMBER',
            'TRANSPORTASI',
            'MERK',
            'MODEL',
            'WAKTU RENTAL',
            'METODE PEMBAYARAN',
            'STATUS PEMBAYARAN',
            'STATUS RENTAL',
            'TOTAL',
        ];
    }
}
