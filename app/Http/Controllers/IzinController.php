<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class IzinController extends Controller
{
    public function index()
    {
        $search = request('search');
        if ($search) {
            $izins = Izin::where(function ($query) use ($search) {
                $query->where('keperluan', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%');
            })
                ->paginate(10)
                ->withQueryString();
        } elseif ($search) {
            $izins = Izin::where('id', '!=', '0')
                ->paginate(10);
        } else {
            $izins = Izin::where('user_id', auth()->user()->id)
                ->orderBy('id', 'desc')
                ->get();
        }

        $izinsApproved = Izin::where('user_id', auth()->user()->id)->where('status', ['approved'])->count();

        return view('izin.index', compact('izins', 'izinsApproved'));
    }

    public function create()
    {
        // $izins = Izin::where('user_id', auth()->user()->id)->get();

        return view('izin.create');
    }

    public function store(Request $request, Izin $izin)
    {
        $request->validate([
            'tanggalmulai' => 'required',
            'jammulai' => 'required',
            'tanggalselesai' => 'required',
            'jamselesai' => 'required',
            'keperluan' => 'required'
        ]);

        $izin = Izin::create([
            'user_id' => auth()->user()->id,
            'tanggalmulai' => $request->tanggalmulai,
            'jammulai' => $request->jammulai,
            'tanggalselesai' => $request->tanggalselesai,
            'jamselesai' => $request->jamselesai,
            'keperluan' => ucfirst($request->keperluan),
        ]);
        return redirect()->route('izin.index')->with('success', 'Izin berhasil diajukan!');
    }

    public function approved(Izin $izin)
    {
        if (auth()->user()->id == $izin->user_id) {
            $izin->update(['status', ['approved']]);
            return redirect()->route('izin.index')->with('success', 'Izin diterima!');
        } else {
            return redirect()->route('izin.index')->with('danger', 'Pemagang tidak berhak menerima izin!');
        }
    }

    public function denied(Izin $izin)
    {
        if (auth()->user()->id == $izin->user_id) {
            $izin->update(['status', ['denied']]);
            return redirect()->route('izin.index')->with('success', 'Izin ditolak!');
        } else {
            return redirect()->route('izin.index')->with('danger', 'Pemagang tidak berhak menolak izin!');
        }
    }

    public function destroy(Izin $izin)
    {
        if (auth()->user()->id == $izin->user_id) {
            $izin->delete();
            return redirect()->route('izin.index')->with('success', 'Izin dihapus!');
        } else {
            return redirect()->route('izin.index')->with('danger', 'Anda tidak berhak menghapus izin!');
        }
    }

}
