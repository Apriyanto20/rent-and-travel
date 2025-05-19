<?php

namespace App\Http\Controllers;

use App\Models\RentalOptions;
use Illuminate\Http\Request;

class RentalOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $codeRentalOptions = RentalOptions::createCode();
            $page = request()->input('page', 1);
            $entries = request()->input('entries', 10);
            $search = request()->input('search');

            $query = RentalOptions::query();

            if ($search) {
                $query->where('option', 'like', '%' . $search . '%');
            }

            $rentalOptions = $query->paginate($entries);

            return view('rentalOptions.index', compact(['rentalOptions', 'codeRentalOptions']))
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
        try {
            $data = [
                'codeRentalOption' => $request->input('codeRentalOption'),
                'option' => $request->input('option')
            ];

            RentalOptions::create($data);

            return redirect()
                ->route('rentalOptions.index')
                ->with('message_insert', 'Data Berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()
                ->route('rentalOptions.index')
                ->with('error_message', 'Terjadi kesalahan saat menambahkan data: ' . $e->getMessage());
        }
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
        try {
            $data = [
                'codeRentalOption' => $request->input('codeRentalOption'),
                'option' => $request->input('option')
            ];

            $datas = RentalOptions::findOrFail($id);
            $datas->update($data);
            return redirect()
                ->route('rentalOptions.index')
                ->with('message_update', 'Data Berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()
                ->route('merks.index')
                ->with('error_message', 'Terjadi kesalahan saat melakukan update data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = RentalOptions::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Data Berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error_message', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
