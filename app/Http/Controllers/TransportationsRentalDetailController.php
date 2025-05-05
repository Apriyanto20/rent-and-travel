<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Transportations;
use App\Models\TransportationsRentalDetail;
use Illuminate\Http\Request;

class TransportationsRentalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $codeBus = TransportationsRentalDetail::createCodeBus();
            $codeCar = TransportationsRentalDetail::createCodeCar();
            $codeCarWithDriver = TransportationsRentalDetail::createCodeCarWithDriver();
            $codeCarWithoutDriver = TransportationsRentalDetail::createCodeCarWithoutDriver();
            $codeCarJustDriver = TransportationsRentalDetail::createCodeCarJustDriver();
            $page = request()->input('page', 1);
            $entries = request()->input('entries', 10);
            $search = request()->input('search');

            $query = TransportationsRentalDetail::query()
                ->join('merk', 'transportations_rental_detail.codeMerk', '=', 'merk.codeMerk')
                ->join('transportations', 'transportations_rental_detail.codeTransportation', '=', 'transportations.codeTransportation');

            if ($search) {
                $query->where('merk.merk', 'like', '%' . $search . '%')
                    ->orWhere('transportations.transportation', 'like', '%' . $search . '%');
            }

            $merks = $query->paginate($entries);

            return view('transportationsRental.index', compact(['merks', 'codeBus', 'codeCar', 'codeCarWithDriver', 'codeCarWithoutDriver', 'codeCarJustDriver']))
                ->with('i', ($page - 1) * $entries);
        } catch (\Exception $e) {
            return response()->view('error', [], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $merk = Merk::all();
            $transportation = Transportations::all();
            return view('transportationsRental.create')->with([
                'merk' => $merk,
                'transportation' => $transportation,
            ]);
        } catch (\Exception $e) {
            return response()->view('error', [], 404);
        }
    }

    public function generateCodeDetail($type)
    {
        switch (strtolower($type)) {
            case 'bus':
                $code = TransportationsRentalDetail::createCodeBus();
                break;
            case 'car':
                $code = TransportationsRentalDetail::createCodeCar();
                break;
            case 'motor':
                $code = TransportationsRentalDetail::createCodeMotor();
                break;
            default:
                $code = '';
        }

        return response()->json(['code' => $code]);
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
