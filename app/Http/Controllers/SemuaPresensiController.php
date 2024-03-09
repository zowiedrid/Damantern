<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SemuaPresensiController extends Controller
{
    public function index()
    {
        $users = User::all();
        $presensis = Presensi::orderBy('id', 'desc')
        ->get();

        return view('semuapresensi.index', compact('presensis', 'users'));
    }

    public function destroy(Presensi $presensi)
    {
        if (auth()->user()->id =! 0) {
            $presensi->delete();
            return redirect()->route('semuapresensi.index')->with('success', 'Presensi dihapus!');
        } else {
            return redirect()->route('semuapresensi.index')->with('danger', 'Anda tidak berhak menghapus presensi!');
        }
    }
}
