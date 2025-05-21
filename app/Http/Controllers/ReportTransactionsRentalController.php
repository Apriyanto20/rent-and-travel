<?php

namespace App\Http\Controllers;

use App\Exports\ReportRentalExport;
use App\Models\TransactionsRental;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Maatwebsite\Excel\Facades\Excel;

class ReportTransactionsRentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');
        $rentalStatus = request()->input('rentalStatus');
        $paymentStatus = request()->input('paymentStatus');

        // Cek apakah ada filter
        $hasFilter = $search || $rentalStatus || $paymentStatus;

        if ($hasFilter) {
            $query = TransactionsRental::with(['member', 'transportationRental.transportation', 'transportationRental.merk'])
                ->orderBy('created_at', 'DESC');

            if ($search) {
                $query->whereHas('member', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            }

            if ($rentalStatus) {
                $query->where('rentalStatus', 'CANCEL');
            }

            if ($paymentStatus) {
                $query->where('paymentStatus', $paymentStatus);
            }

            $transactionsRental = $query->paginate($entries);
        } else {
            $transactionsRental = new LengthAwarePaginator([], 0, $entries, $page, [
                'path' => request()->url(),
                'query' => request()->query(),
            ]);
        }

        return view('reportRental.index', compact('transactionsRental', 'hasFilter'))
            ->with('i', ($page - 1) * $entries);
    }

    public function pdf(Request $request)
    {
        dd('hhhh');
        $paymentStatus = $request->paymentStatus;
        $rentalStatus = $request->rentalStatus;

        $data = [ // Data yang akan dipakai di view
            'paymentStatus' => $paymentStatus,
            'rentalStatus' => $rentalStatus,
        ];

        $pdf = Pdf::loadView('exports.report-rental-pdf', $data);
        return $pdf->download('rental-report.pdf');
    }

    public function exportExcel(Request $request)
    {
        $paymentStatus = $request->paymentStatus;
        $rentalStatus = $request->rentalStatus;

        return Excel::download(
            new ReportRentalExport($paymentStatus, $rentalStatus),
            'report-rental.xlsx'
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $paymentStatus = $request->paymentStatus;
        $rentalStatus = $request->rentalStatus;

        $data = TransactionsRental::with(['member', 'transportationRental.transportation', 'transportationRental.merk'])
            ->when($paymentStatus, fn($q) => $q->where('paymentStatus', $paymentStatus))
            ->when($rentalStatus, fn($q) => $q->where('rentalStatus', $rentalStatus))
            ->get();
//dd($data);
        $pdf = Pdf::loadView('exports.report-rental-pdf', ['data' => $data]);
        return $pdf->download('rental-report.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
