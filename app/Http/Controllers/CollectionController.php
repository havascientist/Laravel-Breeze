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

    public function getAllCollections(){
        $collections = DB::table('collections')
        ->select(
            'id as id',
            'nama as judul',
            DB::raw('
            CASE
            WHEN jenis="1" THEN "Buku"
            WHEN jenis="2" THEN "Majalah"
            WHEN jenis="3" THEN "Cakram Digital"
            END AS jenis
            '),
            'jumlah as jumlah'
        )
        ->orderBy('nama', 'asc')
        ->get();

        return Datatables::of($collections)
        -> addColumn('action', function ($collection){
            $html = '
            <button data-rowid="" class=" btn btn-xs btn-light" data-toggle="tooltip" data-placement="top" data-container="body" title="Edit Koleksi" onclick="infoKoleksi('."'".$collection->id."'".')>
            <i class="fa fa-edit"></i>
            ';
            return $html;
        })
        -> make (true);
    }

}
