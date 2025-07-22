<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuti;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cutiList = Cuti::where('id_user', Auth::id())->latest()->get();
        return view('pegawai.cuti.index', compact('cutiList'));
    }

    public function create()
    {
        return view('pegawai.cuti.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'perihal_cuti' => 'required|string|max:255',
            'alasan' => 'required|string',
            'mulai' => 'required|date',
            'berakhir' => 'required|date|after_or_equal:mulai',
        ]);

        Cuti::create([
            'id_cuti' => Str::uuid(),
            'id_user' => Auth::id(),
            'alasan' => $request->alasan,
            'tgl_diajukan' => now(),
            'mulai' => $request->mulai,
            'berakhir' => $request->berakhir,
            'id_status_cuti' => 1, // misalnya default status "menunggu"
            'perihal_cuti' => $request->perihal_cuti,
        ]);

        return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti berhasil dikirim.');
    }

    public function show(Cuti $cuti)
    { /* jika perlu tampil detail */
    }

    public function edit(Cuti $cuti)
    {
        if ($cuti->id_user !== Auth::id()) abort(403);
        return view('pegawai.cuti.edit', compact('cuti'));
    }

    public function update(Request $request, Cuti $cuti)
    {
        if ($cuti->id_user !== Auth::id()) abort(403);

        $request->validate([
            'perihal_cuti' => 'required|string|max:255',
            'alasan' => 'required|string',
            'mulai' => 'required|date',
            'berakhir' => 'required|date|after_or_equal:mulai',
        ]);

        $cuti->update($request->only(['perihal_cuti', 'alasan', 'mulai', 'berakhir']));

        return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti berhasil diperbarui.');
    }

    public function destroy(Cuti $cuti)
    {
        if ($cuti->id_user !== Auth::id()) abort(403);
        $cuti->delete();
        return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti dihapus.');
    }
}
