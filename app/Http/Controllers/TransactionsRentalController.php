<?php

namespace App\Http\Controllers;

use App\Models\TransactionsRental;
use Illuminate\Http\Request;

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

            if ($search) {
                //$query->where('merk', 'like', '%' . $search . '%');
            }

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
    public function create()
    {
        //
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
