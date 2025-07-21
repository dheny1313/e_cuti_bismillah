<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\JenisKelamin;

class UserDetailController extends Controller
{
    public function index()
    {
        $userDetails = UserDetail::with('jenisKelamin')->get();
        return view('admin.user_details.index', compact('userDetails'));
    }

    public function create()
    {
        $jenisKelaminList = JenisKelamin::all();
        return view('admin.user_details.create', compact('jenisKelaminList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin_id' => 'required|exists:jenis_kelamins,id',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'nip' => 'nullable|string|max:50',
            'pangkat' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:100',
        ]);

        UserDetail::create($request->all());

        return redirect()->route('user-details.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(UserDetail $userDetail)
    {
        $jenisKelaminList = JenisKelamin::all();
        return view('admin.user_details.edit', compact('userDetail', 'jenisKelaminList'));
    }

    public function update(Request $request, UserDetail $userDetail)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin_id' => 'required|exists:jenis_kelamins,id',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'nip' => 'nullable|string|max:50',
            'pangkat' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:100',
        ]);

        $userDetail->update($request->all());

        return redirect()->route('user-details.index')->with('success', 'Data berhasil diupdate.');
    }


    public function destroy(UserDetail $userDetail)
    {
        $userDetail->delete();
        return redirect()->route('user-details.index')->with('success', 'Data berhasil dihapus.');
    }
}
