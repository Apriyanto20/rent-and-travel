<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DriversExport;

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
        try {
            return view('drivers.create');
        } catch (\Exception $e) {
            return response()->view('error', [], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        try {
            $kode = date('YmdHis');

            $user = User::where('email', $request->input('email'))->first();

            if (!$user) {
                $user = User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => $request->input('nik'),
                    'role' => 'D'
                ]);
            }

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
                'maritalStatus' => $request->input('materialStatus'),
                'photo' => $photoFileName,
                'photoKtp' => $photoKtpFileName,
                'notes' => $request->input('notes'),
                'prices' => $request->input('prices'),
                'userId' => Auth::user()->id,
            ];

            Drivers::create($data);

            /*$dataUser = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('nik')),
                'role' => 'D',
            ];

            User::create($dataUser);*/

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
        try {
            $driver = Drivers::where('id', $id)->first();
            return view('drivers.edit')->with([
                'driver' => $driver
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
        //try {
        $user = Drivers::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $userUp = User::where('email', $user->email)->first();

        if ($userUp) {
            $userUp->name = $request->input('name');
            $userUp->email = $request->input('email');
            $userUp->password = Hash::make($request->input('nik'));
            $userUp->save();
        }

        $oldPhoto = $user->photo;
        $oldPhotoKtp = $user->photoKtp;

        $kode = date('YmdHis');

        if ($request->hasFile('photo')) {
            $photoPath = public_path('driver/img/' . $oldPhoto);
            if (!empty($oldPhoto) && file_exists($photoPath)) {
                unlink($photoPath);
            }

            $photoFile = $request->file('photo');
            $photoFileName = $kode . '-photo.' . $photoFile->extension();
            $photoFile->move(public_path('driver/img'), $photoFileName);
            $user->photo = $photoFileName;
        }

        if ($request->hasFile('photoKtp')) {
            $photoKtpPath = public_path('driver/ktp/' . $oldPhotoKtp);
            if (!empty($oldPhotoKtp) && file_exists($photoKtpPath)) {
                unlink($photoKtpPath);
            }

            $photoKtpFile = $request->file('photoKtp');
            $photoKtpFileName = $kode . '-photoKtp.' . $photoKtpFile->extension();
            $photoKtpFile->move(public_path('driver/ktp'), $photoKtpFileName);
            $user->photoKtp = $photoKtpFileName;
        }

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
        $user->maritalStatus = $request->input('materialStatus');
        $user->notes = $request->input('notes');
        $user->prices = $request->input('prices');
        $user->userId = Auth::user()->id;

        $user->save();

        return redirect()
            ->route('drivers.index')
            ->with('message_update', 'Data Berhasil diupdate');
        /*} catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }*/
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Drivers::findOrFail($id);
            $photoKtpPath = public_path('driver/ktp/' . $data->photoKtp);
            $photoPath = public_path('driver/img/' . $data->photo);

            if (!empty($data->photoKtp) && file_exists($photoKtpPath)) {
                unlink($photoKtpPath);
            }

            if (!empty($data->photo) && file_exists($photoPath)) {
                unlink($photoPath);
            }

            $userUp = User::where('email', $data->email)->first();
            if ($userUp) {
                $userUp->delete();
            }
            $data->delete();
            return back()->with('message_delete', 'Data Berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error_message', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }

        public function export()
    {
        return Excel::download(new DriversExport, 'drivers.xlsx');
    }
}
