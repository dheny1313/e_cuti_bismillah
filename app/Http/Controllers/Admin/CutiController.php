<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\StatusCuti;
use App\Models\User;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
        $cutis = Cuti::with(['user.user_detail', 'status'])->paginate(10);
        return view('admin.cuti.index', compact('cutis'));
    }

    public function create()
    {
        $users = User::with('user_detail')->get();
        $statusCuti = StatusCuti::all();
        return view('admin.cuti.create', compact('users', 'statusCuti'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'alasan' => 'required',
            'tgl_diajukan' => 'required|date',
            'mulai' => 'required|date',
            'berakhir' => 'required|date|after_or_equal:mulai',
            'id_status_cuti' => 'required',
            'perihal_cuti' => 'required',
        ]);

        $cuti = new Cuti($request->all());
        $cuti->id_cuti = $this->generateCutiId();
        $cuti->save();

        return redirect()->route('admin.cuti.index')->with('success', 'Data cuti berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $cuti = Cuti::findOrFail($id);
        $users = User::with('user_detail')->get();
        $statusCuti = StatusCuti::all();
        return view('admin.cuti.edit', compact('cuti', 'users', 'statusCuti'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_user' => 'required',


            
            'alasan' => 'required',
            'tgl_diajukan' => 'required|date',
            'mulai' => 'required|date',
            'berakhir' => 'required|date|after_or_equal:mulai',
            'id_status_cuti' => 'required',
            'perihal_cuti' => 'required',
        ]);

        $cuti = Cuti::findOrFail($id);
        $cuti->update($request->all());

        return redirect()->route('admin.cuti.index')->with('success', 'Data cuti berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();

        return redirect()->route('admin.cuti.index')->with('success', 'Data cuti berhasil dihapus.');
    }

    private function generateCutiId()
    {
        $last = Cuti::orderBy('id_cuti', 'desc')->first();
        if (!$last) return 'CT-0001';
        $num = (int) substr($last->id_cuti, 3) + 1;
        return 'CT-' . str_pad($num, 4, '0', STR_PAD_LEFT);
    }
}
