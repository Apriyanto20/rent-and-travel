<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use App\Models\TransactionsRental;
use App\Models\TransportationsRentalDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionsRentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $codeMerk = TransactionsRental::createCode();
            $page = request()->input('page', 1);
            $entries = request()->input('entries', 10);
            $search = request()->input('search');

            $query = TransactionsRental::query();

            /*if ($search) {
                $query->where('merk.merk', 'like', '%' . $search . '%')
                    ->orWhere('transportations.transportation', 'like', '%' . $search . '%');
            }*/

            $transactionsRental = $query->paginate($entries);

            return view('transactionsRental.index', compact(['transactionsRental', 'codeMerk']))
                ->with('i', ($page - 1) * $entries);
        } catch (\Exception $e) {
            return response()->view('error', [], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($codeDetailTransportation)
    {
        $codeDetailTransportation = $codeDetailTransportation;
        $transportation = TransportationsRentalDetail::where('codeDetailTransportation', $codeDetailTransportation)->first();
        $driver = Drivers::where('status', '!=', 'TIDAK TERSEDIA')->get();
        return view('transactionsRental.create')->with([
            'codeDetailTransportation' => $codeDetailTransportation,
            'driver' => $driver,
            'transportation' => $transportation,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'codeTransaction' => TransactionsRental::createCode(),
            'memberCode' => $request->input('memberCode'),
            'codeRentalOption' => $request->input('codeRentalOption'),
            'codeDetailTransportation' => $request->input('codeDetailTransportation'),
            'driverCode' => $request->input('driver'),
            'rentalStartDate' => $request->input('rentalStartDate'),
            'rentalEndDate' => $request->input('rentalEndDate'),
            'rentalCost' => $request->input('totalPriceRental'),
            'paymentStatus' => 'WAITING FOR PAYMENT',
            'paymentMethod' => $request->input('paymentMethod'),
            'rentalStatus' => 'WAITING FOR PAYMENT',
        ];

        TransactionsRental::create($data);

        TransportationsRentalDetail::where('codeDetailTransportation', $request->input('codeDetailTransportation'))
                ->update(['vehicle_statuses' => 'TIDAK TERSEDIA']);

        if ($request->input('driver') > 0) {
            $driver = Drivers::where('nik', $request->input('driver'))->first();
            $driver->status = 'TIDAK TERSEDIA';
            $driver->save();
        }

        return redirect()
            ->route('transactionsRental.index')
            ->with('message_insert', 'Data Berhasil ditambahkan');
    }

    public function autoCancel($id)
    {
        $transaction = TransactionsRental::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        if (!$transaction->proofOfPayment && now()->diffInMinutes($transaction->created_at) >= 6) {
            $transaction->paymentStatus = 'CANCEL';
            $transaction->rentalStatus = 'CANCEL';
            $transaction->save();

            return response()->json(['message' => 'Transaksi dibatalkan karena melebihi batas waktu.']);
        }

        return response()->json(['message' => 'Transaksi masih valid.'], 200);
    }

    public function checkExpired(Request $request)
    {
        $transaction = TransactionsRental::find($request->id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        $expiredAt = Carbon::parse($transaction->created_at)->addMinutes(1);

        if (now()->greaterThanOrEqualTo($expiredAt) && !$transaction->proofOfPayment && $transaction->rentalStatus === "WAITING FOR PAYMENT" && $transaction->paymentStatus === "WAITING FOR PAYMENT") {
            $transaction->paymentStatus = 'CANCEL';
            $transaction->rentalStatus = 'CANCEL';
            $transaction->save();

            TransportationsRentalDetail::where('codeDetailTransportation', $transaction->codeDetailTransportation)
                ->update(['vehicle_statuses' => 'TERSEDIA']);

            if ($transaction->driverCode) {
                Drivers::where('nik', $transaction->driverCode)
                    ->update(['status' => 'ACTIVE']);
            }

            return response()->json(['updated' => true]);
        }

        return response()->json(['updated' => false]);
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

    public function updateStatus(Request $request, string $id)
    {
        $transaction = TransactionsRental::findOrFail($id);

        // Jika bukti pembayaran belum ada (masih null), maka ubah status atau lakukan sesuatu
        if (is_null($transaction->proofOfPayment)) {
            $transaction->rentalStatus = 'Dibatalkan'; // Atau status lain seperti 'Expired', 'Cancelled', dll.
            $transaction->paymentStatus = 'Dibatalkan'; // Atau status lain seperti 'Expired', 'Cancelled', dll.
            $transaction->save();

            return redirect()->back()->with('warning', 'Transaksi dibatalkan karena melewati batas waktu pembayaran.');
        }

        // Jika ada bukti pembayaran, tidak perlu update
        return redirect()->back()->with('info', 'Transaksi sudah memiliki bukti pembayaran.');
    }

    public function updatePembayaran(Request $request, $id)
    {
        $transaction = TransactionsRental::findOrFail($id);
        $kode = date('YmdHis');
        if ($request->hasFile('proof_of_payment')) {
            $proofOfPayment = $request->file('proof_of_payment');
            $proofOfPaymentFileName = $kode . '-qris.' . $proofOfPayment->extension();
            $proofOfPayment->move(public_path('payment/'), $proofOfPaymentFileName);
            $proofOfPaymentFilePath = 'qris/' . $proofOfPaymentFileName;

            $transaction->proofOfPayment = $proofOfPaymentFileName;
            $transaction->paymentStatus = 'SUCCESS';
            $transaction->rentalStatus = 'RENTAL';
            $transaction->save();

            return redirect()->back()->with('message_insert', 'Pembayaran Success');
        } else {
            return redirect()->back()->with('error', 'Bukti Pembayaran tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
