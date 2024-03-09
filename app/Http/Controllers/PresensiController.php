<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index()
    {
        $presensis = Presensi::where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('presensi.index', compact('presensis'));
    }

    public function create()
    {
        return view('presensi.create');
    }

    public function store(Request $request, Presensi $presensi)
    {
        $request->validate([
            'tanggal' => 'required',
            'jenispresensi' => 'required',
            'jampresensi' => 'required'
        ]);

        $presensi = Presensi::create([
            'tanggal' => $request->tanggal,
            'user_id' => auth()->user()->id,
            'jenispresensi' => $request->jenispresensi,
            'jampresensi' => $request->jampresensi,
        ]);
        return redirect()->route('presensi.index')->with('success', 'Presensi berhasil direkam!');
    }
}
