<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Transportations;
use App\Models\TransportationsRentalDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransportationsRentalDetailController extends Controller
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

            $query = TransportationsRentalDetail::query()
                ->join('merk', 'transportations_rental_detail.codeMerk', '=', 'merk.codeMerk')
                ->join('transportations', 'transportations_rental_detail.codeTransportation', '=', 'transportations.codeTransportation')
                ->where('transportations_rental_detail.codeTransportation', 'TP00001');

            if ($search) {
                $query->where('merk.merk', 'like', '%' . $search . '%')
                    ->orWhere('transportations.transportation', 'like', '%' . $search . '%');
            }

            $transportationDetailRental = $query->paginate($entries);

            return view('transportationsRental.index', compact(['transportationDetailRental']))
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
            $codeRentalMobil = TransportationsRentalDetail::codeRentalMobil();
            return view('transportationsRental.create')->with([
                'merk' => $merk,
                'transportation' => $transportation,
                'codeRentalMobil' => $codeRentalMobil,
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
        $kode = $request->input('codeDetailTransportation');

        // Proses upload foto kendaraan
        if ($request->hasFile('photo_front')) {
            $photoFront = $request->file('photo_front');
            $photoFrontFileName = $kode . '-front.' . $photoFront->extension();
            $photoFront->move(public_path('rental/car'), $photoFrontFileName);
            $photoFrontFilePath = 'rental/car/' . $photoFrontFileName;
        } else {
            return redirect()->back()->with('error', 'Foto depan kendaraan tidak ditemukan');
        }

        if ($request->hasFile('photo_right')) {
            $photoRight = $request->file('photo_right');
            $photoRightFileName = $kode . '-right.' . $photoRight->extension();
            $photoRight->move(public_path('rental/car'), $photoRightFileName);
            $photoRightFilePath = 'rental/car/' . $photoRightFileName;
        } else {
            return redirect()->back()->with('error', 'Foto kanan kendaraan tidak ditemukan');
        }

        if ($request->hasFile('photo_left')) {
            $photoLeft = $request->file('photo_left');
            $photoLeftFileName = $kode . '-left.' . $photoLeft->extension();
            $photoLeft->move(public_path('rental/car'), $photoLeftFileName);
            $photoLeftFilePath = 'rental/car/' . $photoLeftFileName;
        } else {
            return redirect()->back()->with('error', 'Foto kiri kendaraan tidak ditemukan');
        }

        if ($request->hasFile('photo_back')) {
            $photoBack = $request->file('photo_back');
            $photoBackFileName = $kode . '-back.' . $photoBack->extension();
            $photoBack->move(public_path('rental/car'), $photoBackFileName);
            $photoBackFilePath = 'rental/car/' . $photoBackFileName;
        } else {
            return redirect()->back()->with('error', 'Foto belakang kendaraan tidak ditemukan');
        }

        $data = [
            'codeDetailTransportation' => $request->input('codeDetailTransportation'),
            'codeTransportation' => $request->input('codeTransportation'),
            'codeMerk' => $request->input('codeMerk'),
            'vehicle_statuses' => $request->input('vehicle_statuses'),
            'license_plate' => $request->input('license_plate'),
            'color' => $request->input('color'),
            'seats' => $request->input('seats'),
            'model' => $request->input('model'),
            'production_year' => $request->input('production_year'),
            'chassis_number' => $request->input('chassis_number'),
            'engine_number' => $request->input('engine_number'),
            'engine_capacity' => $request->input('engine_capacity'),
            'fuel_type' => $request->input('fuel_type'),
            'transmission' => $request->input('transmission'),
            'ownership_status' => $request->input('ownership_status'),
            'registration_date' => $request->input('registration_date'),
            'tax_validity_date' => $request->input('tax_validity_date'),
            'vehicle_condition' => $request->input('vehicle_condition'),
            'insurance_status' => $request->input('insurance_status'),
            'location' => $request->input('location'),
            'rental_price' => $request->input('rental_price'),
            'photo_front' => $photoFrontFileName,
            'photo_right' => $photoRightFileName,
            'photo_left' => $photoLeftFileName,
            'photo_back' => $photoBackFileName,
            'notes' => $request->input('notes'),
            'user_id' => Auth::user()->id,
        ];

        TransportationsRentalDetail::create($data);
        return redirect()
            ->route('transportationsRental.index')
            ->with('message_insert', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $transportationsRental = TransportationsRentalDetail::where('codeDetailTransportation', $id)->first();
            return view('transportationsRental.show')->with([
                'transportationsRental' => $transportationsRental,
            ]);
        } catch (\Exception $e) {
            return response()->view('error', [], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $merk = Merk::all();
            $transportationsRental = TransportationsRentalDetail::where('codeDetailTransportation', $id)->first();
            // dd($id);
            return view('transportationsRental.edit')->with([
                'transportationsRental' => $transportationsRental,
                'merk' => $merk,
            ]);
        } catch (\Exception $e) {
            return response()->view('error', [], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        try {
            $vehicle = TransportationsRentalDetail::find($id);

            if (!$vehicle) {
                return redirect()->back()->with('error', 'Data tidak ditemukan.');
            }

            $kode = date('YmdHis');

            // Simpan nama file awal
            $oldFront = $vehicle->photo_front;
            $oldRight = $vehicle->photo_right;
            $oldLeft  = $vehicle->photo_left;
            $oldBack  = $vehicle->photo_back;

            // Handle upload foto depan
            if ($request->hasFile('photo_front')) {
                $frontPath = public_path('rental/car/' . $oldFront);
                if (!empty($oldFront) && file_exists($frontPath)) {
                    unlink($frontPath);
                }

                $photoFront = $request->file('photo_front');
                $photoFrontFileName = $kode . '-front.' . $photoFront->extension();
                $photoFront->move(public_path('rental/car'), $photoFrontFileName);
                $vehicle->photo_front = $photoFrontFileName;
            }

            // Handle upload foto kanan
            if ($request->hasFile('photo_right')) {
                $rightPath = public_path('rental/car/' . $oldRight);
                if (!empty($oldRight) && file_exists($rightPath)) {
                    unlink($rightPath);
                }

                $photoRight = $request->file('photo_right');
                $photoRightFileName = $kode . '-right.' . $photoRight->extension();
                $photoRight->move(public_path('rental/car'), $photoRightFileName);
                $vehicle->photo_right = $photoRightFileName;
            }

            // Handle upload foto kiri
            if ($request->hasFile('photo_left')) {
                $leftPath = public_path('rental/car/' . $oldLeft);
                if (!empty($oldLeft) && file_exists($leftPath)) {
                    unlink($leftPath);
                }

                $photoLeft = $request->file('photo_left');
                $photoLeftFileName = $kode . '-left.' . $photoLeft->extension();
                $photoLeft->move(public_path('rental/car'), $photoLeftFileName);
                $vehicle->photo_left = $photoLeftFileName;
            }

            // Handle upload foto belakang
            if ($request->hasFile('photo_back')) {
                $backPath = public_path('rental/car/' . $oldBack);
                if (!empty($oldBack) && file_exists($backPath)) {
                    unlink($backPath);
                }

                $photoBack = $request->file('photo_back');
                $photoBackFileName = $kode . '-back.' . $photoBack->extension();
                $photoBack->move(public_path('rental/car'), $photoBackFileName);
                $vehicle->photo_back = $photoBackFileName;
            }

            // Update data kendaraan
            $vehicle->codeDetailTransportation = $request->input('codeDetailTransportation');
            $vehicle->codeTransportation       = $request->input('codeTransportation');
            $vehicle->codeMerk                 = $request->input('codeMerk');
            $vehicle->vehicle_statuses         = $request->input('vehicle_statuses');
            $vehicle->license_plate            = $request->input('license_plate');
            $vehicle->color                    = $request->input('color');
            $vehicle->seats                    = $request->input('seats');
            $vehicle->model                    = $request->input('model');
            $vehicle->production_year          = $request->input('production_year');
            $vehicle->chassis_number           = $request->input('chassis_number');
            $vehicle->engine_number            = $request->input('engine_number');
            $vehicle->engine_capacity          = $request->input('engine_capacity');
            $vehicle->fuel_type                = $request->input('fuel_type');
            $vehicle->transmission             = $request->input('transmission');
            $vehicle->ownership_status         = $request->input('ownership_status');
            $vehicle->registration_date        = $request->input('registration_date');
            $vehicle->tax_validity_date        = $request->input('tax_validity_date');
            $vehicle->vehicle_condition        = $request->input('vehicle_condition');
            $vehicle->insurance_status         = $request->input('insurance_status');
            $vehicle->location                 = $request->input('location');
            $vehicle->rental_price             = $request->input('rental_price');
            $vehicle->notes                    = $request->input('notes');
            $vehicle->user_id                  = Auth::user()->id;

            $vehicle->save();

            return redirect()->route('transportationsRental.index')->with('message_update', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = TransportationsRentalDetail::findOrFail($id);
            $photoFrontFileName = public_path('rental/car/' . $data->photo_front);
            $photoRightFileName = public_path('rental/car/' . $data->photo_right);
            $photoLeftFileName = public_path('rental/car/' . $data->photo_left);
            $photoBackFileName = public_path('rental/car/' . $data->photo_back);

            if (!empty($data->photo_front) && file_exists($photoFrontFileName)) {
                unlink($photoFrontFileName);
            }

            if (!empty($data->photo_right) && file_exists($photoRightFileName)) {
                unlink($photoRightFileName);
            }

            if (!empty($data->photo_left) && file_exists($photoLeftFileName)) {
                unlink($photoLeftFileName);
            }

            if (!empty($data->photo_back) && file_exists($photoBackFileName)) {
                unlink($photoBackFileName);
            }

            $data->delete();
            return back()->with('message_delete', 'Data Berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error_message', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
