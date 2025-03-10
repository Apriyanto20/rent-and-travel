<?php

namespace App\Http\Controllers;

use App\Models\TransportationRoute;
use Illuminate\Http\Request;

class TransportationsRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $page = request()->input('page', 1);
            $entries = request()->input('entries', 10);
            $search = request()->input('search');

            $query = TransportationRoute::query();

            if ($search) {
                $query->where('route', 'like', '%' . $search . '%')
                    ->orWhere('route_price', 'like', '%' . $search . '%');
            }

            $transportationRoutes = $query->paginate($entries);

            return view('transportationRoutes.index', compact('transportationRoutes'))
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
                'codeRoute' => $request->input('codeRoute'),
                'route' => $request->input('route'),
                'route_price' => $request->input('route_price'),
            ];

            TransportationRoute::create($data);

            return redirect()
                ->route('transportationRoutes.index')
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
                'codeRoute' => $request->input('codeRoute'),
                'route' => $request->input('route'),
                'route_price' => $request->input('route_price'),
            ];

            $datas = TransportationRoute::findOrFail($id);
            $datas->update($data);
            return redirect()
                ->route('transportationRoutes.index')
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
            $data = TransportationRoute::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Data Berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error_message', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
