<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::all();
        return view('koleksi.daftarKoleksi', compact('collections'));
    }

    public function create()
    {
        return view('koleksi.registrasi');
    }

    public function store(Request $request)
{
    // Validasi input dari formulir registrasi koleksi
    $request->validate([
        'namaKoleksi' => 'required|string|max:100',
        'jenisKoleksi' => 'required|integer|in:1,2,3',
        'created_at' => 'required|date',                                                   
        'jumlahKoleksi' => 'required|integer',
    ]);

    // Simpan data koleksi ke dalam database
    Collection::create([
        'namaKoleksi' => $request->namaKoleksi,
        'jenisKoleksi' => $request->jenisKoleksi,
        'created_at' => $request->created_at,
        'jumlahKoleksi' => $request->jumlahKoleksi,
    ]);

    return redirect()->route('koleksi.daftarKoleksi')->with('success', 'Koleksi berhasil ditambahkan.');
}

    public function show(Collection $collection)
    {
        return view('koleksi.infoKoleksi', compact('collection'));
    }
}
