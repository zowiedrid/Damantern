<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index()
    {
        $search = request('search');
        if ($search) {
            $rekaps = Rekap::where(function ($query) use ($search) {
                $query->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('rekap', 'like', '%' . $search . '%');
            })
                ->paginate(10)
                ->withQueryString();
                
        } elseif ($search) {
            $rekaps = Rekap::where('id', '!=', '0')
                ->paginate(10);
        } else {
            $rekaps = Rekap::where('user_id', auth()->user()->id)
                ->orderBy('id', 'desc')
                ->get();
        }


        return view('rekap.index', compact('rekaps'));
    }

    public function create()
    {
        return view('rekap.create');
    }

    public function store(Request $request, Rekap $rekap)
    {
        $request->validate([
            'tanggal' => 'required',
            'judul' => 'required',
            'rekap' => 'required'
        ]);

        $rekap = Rekap::create([
            'tanggal' => $request->tanggal,
            'user_id' => auth()->user()->id,
            'judul' => ucfirst($request->judul),
            'rekap' => ucfirst($request->rekap),
        ]);
        return redirect()->route('rekap.index')->with('success', 'Rekap berhasil direkam!');
    }

    public function destroy(Rekap $rekap)
    {
        if (auth()->user()->id == $rekap->user_id) {
            $rekap->delete();
            return redirect()->route('rekap.index')->with('success', 'Rekap dihapus!');
        } else {
            return redirect()->route('rekap.index')->with('danger', 'Anda tidak berhak menghapus rekap!');
        }
    }

}
