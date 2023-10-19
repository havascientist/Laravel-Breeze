<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('user.daftarPengguna');
    }

    public function getData(){
        $data = User::all();
        return Datatables::of($data)->make(true);
    }

    public function create()
    {
        return view('user.registrasi');
    }

    public function store(Request $request)
    {
        // Validasi input dari formulir registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|max:255',
        ]);

        // Simpan data pengguna ke dalam database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('user.daftarPengguna')->with('success', 'Pengguna berhasil terdaftar.');
    }

    public function show(User $user)
    {
        return view('user.infoPengguna', compact('user'));
    }
}
// -- Nama : Putri Rahel Patrisia
// -- Nim : 6706223161
