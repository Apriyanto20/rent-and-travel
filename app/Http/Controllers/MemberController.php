<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
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

            $query = Members::query();

            if ($search) {
                $query->where('nik', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%');
            }

            $members = $query->paginate($entries);

            return view('members.index', compact('members'))
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
            return view('members.create');
        } catch (\Exception $e) {
            return response()->view('error', [], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
            $photoFilePath = $photoFile->move(public_path('member/img'), $photoFileName);
            $photoFilePath = 'member/img/' . $photoFileName;
        } else {
            return redirect()->back()->with('error', 'Foto tidak ditemukan');
        }

        // Proses upload photoKtp
        if ($request->hasFile('photoKtp')) {
            $photoKtpFile = $request->file('photoKtp');
            $photoKtpFileName = $kode . '-photoKtp.' . $photoKtpFile->extension();
            $photoKtpFilePath = $photoKtpFile->move(public_path('member/ktp'), $photoKtpFileName);
            $photoKtpFilePath = 'member/ktp/' . $photoKtpFileName;
        } else {
            return redirect()->back()->with('error', 'Foto KTP tidak ditemukan');
        }

        // Data yang akan disimpan
        $data = [
            'nik' => $request->input('nik'),
            'name' => $request->input('name'),
            'phoneNumber' => $request->input('phoneNumber'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'dateOfBirth' => $request->input('dateOfBirth'),
            'gender' => $request->input('gender'),
            'photo' => $photoFileName,
            'photoKtp' => $photoKtpFileName,
        ];
        Members::create($data);

        /*$dataUser = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('nik')),
            'role' => 'M',
        ];

        User::create($dataUser);*/

        return redirect()
            ->route('members.index')
            ->with('message_insert', 'Data Berhasil ditambahkan');
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
            $members = Members::where('id', $id)->first();
            return view('members.edit')->with([
                'members' => $members
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
        try {
            $user = Members::find($id);

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
                $photoPath = public_path('member/img/' . $oldPhoto);
                if (!empty($oldPhoto) && file_exists($photoPath)) {
                    unlink($photoPath);
                }

                $photoFile = $request->file('photo');
                $photoFileName = $kode . '-photo.' . $photoFile->extension();
                $photoFile->move(public_path('member/img'), $photoFileName);
                $user->photo = $photoFileName;
            }

            if ($request->hasFile('photoKtp')) {
                $photoKtpPath = public_path('member/ktp/' . $oldPhotoKtp);
                if (!empty($oldPhotoKtp) && file_exists($photoKtpPath)) {
                    unlink($photoKtpPath);
                }

                $photoKtpFile = $request->file('photoKtp');
                $photoKtpFileName = $kode . '-photoKtp.' . $photoKtpFile->extension();
                $photoKtpFile->move(public_path('member/ktp'), $photoKtpFileName);
                $user->photoKtp = $photoKtpFileName;
            }

            $user->nik = $request->input('nik');
            $user->name = $request->input('name');
            $user->phoneNumber = $request->input('phoneNumber');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->dateOfBirth = $request->input('dateOfBirth');
            $user->gender = $request->input('gender');

            $user->save();

            return redirect()
                ->route('members.index')
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
            $data = Members::findOrFail($id);
            $photoKtpPath = public_path('member/ktp/' . $data->photoKtp);
            $photoPath = public_path('member/img/' . $data->photo);

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
}
