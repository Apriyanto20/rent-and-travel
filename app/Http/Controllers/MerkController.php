<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $codeMerk = Merk::createCode();
            $page = request()->input('page', 1);
            $entries = request()->input('entries', 10);
            $search = request()->input('search');

            $query = Merk::query();

            if ($search) {
                $query->where('merk', 'like', '%' . $search . '%');
            }

            $merks = $query->paginate($entries);

            return view('merks.index', compact(['merks', 'codeMerk']))
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
                'codeMerk' => $request->input('codeMerk'),
                'merk' => $request->input('merk')
            ];

            Merk::create($data);

            return redirect()
                ->route('merks.index')
                ->with('message_insert', 'Data Berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()
                ->route('merks.index')
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
                'codeMerk' => $request->input('codeMerk'),
                'merk' => $request->input('merk')
            ];

            $datas = Merk::findOrFail($id);
            $datas->update($data);
            return redirect()
                ->route('merks.index')
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
            $data = Merk::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Data Berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error_message', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
