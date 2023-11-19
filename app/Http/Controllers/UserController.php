<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|max:255',
        ]);

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
    public function update(Request $request, User $users)
    {
        $request->validate([
            'username' => 'required',
            'fullname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'address' => 'required',
            'birthdate' => 'required|date',
            'phoneNumber' => 'required',
            'agama' => 'required',
            'jenisKelamin' => 'required|in:0,1',
        ]);        
        $affacted = DB::table('users')->where('id', $request->id)->update([
            'fullname' => $request->fullname, 
            'password' => Hash::make($request->password),  
            'address' => $request->address, 
            'phoneNumber' => $request->phoneNumber, 
        ]
        );
        return redirect()->route('user.daftarPengguna')->with('success', 'Pengguna berhasil diperbarui.');
    }
}
// -- Nama : Putri Rahel Patrisia
// -- Nim : 6706223161
