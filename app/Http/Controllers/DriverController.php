<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use Illuminate\Http\Request;

class DriverController extends Controller
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

            $query = Drivers::query();

            if ($search) {
                $query->where('nik', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%');
            }

            $drivers = $query->paginate($entries);

            return view('drivers.index', compact('drivers'))
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
            $kode = date('YmdHis');

            // Proses upload photo
            if ($request->hasFile('photo')) {
                $photoFile = $request->file('photo');
                $photoFileName = $kode . '-photo.' . $photoFile->extension();
                $photoFilePath = $photoFile->move(public_path('driver/img'), $photoFileName);
                $photoFilePath = 'driver/img/' . $photoFileName;
            } else {
                return redirect()->back()->with('error', 'Foto tidak ditemukan');
            }

            // Proses upload photoKtp
            if ($request->hasFile('photoKtp')) {
                $photoKtpFile = $request->file('photoKtp');
                $photoKtpFileName = $kode . '-photoKtp.' . $photoKtpFile->extension();
                $photoKtpFilePath = $photoKtpFile->move(public_path('driver/ktp'), $photoKtpFileName);
                $photoKtpFilePath = 'driver/ktp/' . $photoKtpFileName;
            } else {
                return redirect()->back()->with('error', 'Foto KTP tidak ditemukan');
            }

            // Data yang akan disimpan
            $data = [
                'nik' => $request->input('nik'),
                'name' => $request->input('name'),
                'driverLicenseNumber' => $request->input('driverLicenseNumber'),
                'licenseType' => $request->input('licenseType'),
                'licenseValidityDate' => $request->input('licenseValidityDate'),
                'address' => $request->input('address'),
                'phoneNumber' => $request->input('phoneNumber'),
                'email' => $request->input('email'),
                'dateOfBirth' => $request->input('dateOfBirth'),
                'status' => $request->input('status'),
                'workExperience' => $request->input('workExperience'),
                'startDate' => $request->input('startDate'),
                'maritalStatus' => $request->input('maritalStatus'),
                'photo' => $photoFilePath,
                'photoKtp' => $photoKtpFilePath,
                'notes' => $request->input('notes'),
                'prices' => $request->input('prices'),
                'userId' => $request->input('userId'),
            ];

            Drivers::create($data);

            return redirect()
                ->route('drivers.index')
                ->with('message_insert', 'Data Berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
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
            $user = Drivers::find($id);

            if (!$user) {
                return redirect()->back()->with('error', 'Data tidak ditemukan.');
            }

            // Simpan nama file lama untuk referensi
            $oldPhoto = $user->photo;
            $oldPhotoKtp = $user->photoKtp;

            $kode = date('YmdHis');

            // Jika ada file photo baru yang diunggah
            if ($request->hasFile('photo')) {
                // Hapus file lama jika ada
                if ($oldPhoto && file_exists(public_path($oldPhoto))) {
                    unlink(public_path($oldPhoto));
                }

                $photoFile = $request->file('photo');
                $photoFileName = $kode . '-photo.' . $photoFile->extension();
                $photoFilePath = $photoFile->move(public_path('driver/img'), $photoFileName);
                $user->photo = 'driver/img/' . $photoFileName;
            }

            // Jika ada file photoKtp baru yang diunggah
            if ($request->hasFile('photoKtp')) {
                // Hapus file lama jika ada
                if ($oldPhotoKtp && file_exists(public_path($oldPhotoKtp))) {
                    unlink(public_path($oldPhotoKtp));
                }

                $photoKtpFile = $request->file('photoKtp');
                $photoKtpFileName = $kode . '-photoKtp.' . $photoKtpFile->extension();
                $photoKtpFilePath = $photoKtpFile->move(public_path('driver/ktp'), $photoKtpFileName);
                $user->photoKtp = 'driver/ktp/' . $photoKtpFileName;
            }

            // Update data lainnya
            $user->nik = $request->input('nik');
            $user->name = $request->input('name');
            $user->driverLicenseNumber = $request->input('driverLicenseNumber');
            $user->licenseType = $request->input('licenseType');
            $user->licenseValidityDate = $request->input('licenseValidityDate');
            $user->address = $request->input('address');
            $user->phoneNumber = $request->input('phoneNumber');
            $user->email = $request->input('email');
            $user->dateOfBirth = $request->input('dateOfBirth');
            $user->status = $request->input('status');
            $user->workExperience = $request->input('workExperience');
            $user->startDate = $request->input('startDate');
            $user->maritalStatus = $request->input('maritalStatus');
            $user->notes = $request->input('notes');
            $user->prices = $request->input('prices');
            $user->userId = $request->input('userId');

            // Simpan perubahan ke database
            $user->save();

            return redirect()
                ->route('drivers.index')
                ->with('message_update', 'Data Berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Drivers::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Data Berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error_message', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
