<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SemuaIzinController extends Controller
{
    public function index()
    {
        $users = User::all();
        $izins = Izin::orderBy('id', 'desc')
        ->get();

        return view('semuaizin.index', compact('izins', 'users'));
    }

    public function destroy(Izin $izin)
    {
        if (auth()->user()->id =! 0) {
            $izin->delete();
            return redirect()->route('semuaizin.index')->with('success', 'Izin dihapus!');
        } else {
            return redirect()->route('semuaizin.index')->with('danger', 'Anda tidak berhak menghapus izin!');
        }
    }

    // public function approved(Izin $izin)
    // {
        
    //     if (auth()->user()->id == $izin->user_id) {
    //         $izin->update(['status' => "approved"]);
    //         return redirect()->route('semuaizin.index')->with('success', 'Izin diterima!');
    //     } else {
    //         return redirect()->route('semuaizin.index')->with('danger', 'Anda tidak berhak menerima izin!');
    //     }
    // }

    // public function denied(Izin $izin)
    // {
    //     if (auth()->user()->id == $izin->user_id) {
    //         $izin->update(['status' => "denied"]);
    //         return redirect()->route('semuaizin.index')->with('success', 'Izin ditolak!');
    //     } else {
    //         return redirect()->route('semuaizin.index')->with('danger', 'Anda tidak berhak menolak izin!');
    //     }
    // }
    
    public function approved(Request $request, Izin $izin)
    {
        if (auth()->user()->id == $izin->user_id) {
            $izin->status = "approved";
            $izin->save();

            return redirect()->route('semuaizin.index')->with('success', 'Izin diterima!');
        } else {
            return redirect()->route('semuaizin.index')->with('danger', 'Anda tidak berhak menerima izin!');
        }
    }

    public function denied(Request $request, Izin $izin)
    {
        if (auth()->user()->id == $izin->user_id) {
            $izin->status = "denied";
            $izin->save();

            return redirect()->route('semuaizin.index')->with('success', 'Izin ditolak!');
        } else {
            return redirect()->route('semuaizin.index')->with('danger', 'Anda tidak berhak menolak izin!');
        }
    }


}
