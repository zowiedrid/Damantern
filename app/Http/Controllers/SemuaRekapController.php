<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SemuaRekapController extends Controller
{
    public function index()
    {
        $users = User::all();
        $rekaps = Rekap::orderBy('id', 'desc')
        ->get();

        return view('semuarekap.index', compact('rekaps', 'users'));
    }


    public function destroy(Rekap $rekap)
    {
        if (auth()->user()->id =! 0) {
            $rekap->delete();
            return redirect()->route('semuarekap.index')->with('success', 'Rekap dihapus!');
        } else {
            return redirect()->route('semuarekap.index')->with('danger', 'Anda tidak berhak menghapus rekap!');
        }
    }
}
