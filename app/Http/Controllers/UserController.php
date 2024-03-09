<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $search = request('search');
        if ($search) {
            $users = User::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('username', 'like', '%' . $search . '%');
            })
                ->orderBy('name')
                ->where('id', '!=', '0')
                ->paginate(10)
                ->withQueryString();
        } else {
            $users = User::where('id', '!=', '1')
                ->orderBy('name')
                ->paginate(10);
        }
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User dihapus!.');
        }
}