<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use App\Models\Koleksi;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    public function index()
    {
        return view('koleksi.daftarKoleksi');
    }

    public function getKoleksi(){
        $data = Collection::all();
        return Datatables::of($data)->make(true);
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
    ],
    [
        'namaKoleksi.unique'   => 'Nama Koleksi sudah ada'
    ]);

    $koleksi = [
        'nama' => $request-> namaKoleksi,
        'jenis' => $request-> jenisKoleksi,
        'jumlahAwal' => $request-> jumlah,
        'jumlahSisa' => $request-> jumlah,
        'jumlahKeluar' => 0        
    ];

    DB::table('collections')-> insert($koleksi);
    return view ('koleksi.daftarKoleksi');
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

    public function getAllCollections()
{
    $collections = DB::table('collections')
        ->select(
            'id',
            'namaKoleksi as judul',
            DB::raw('
            (CASE
            WHEN jenisKoleksi = "1" THEN "Buku"
            WHEN jenisKoleksi = "2" THEN "Majalah"
            WHEN jenisKoleksi = "3" THEN "Cakram Digital"
            END) AS jenisKoleksi'
            ),
            'jumlahAwal as jumlahAwal',
            'jumlahSisa as jumlahSisa',
            'jumlahKeluar as jumlahKeluar',
        )
        ->orderBy('namaKoleksi', 'asc')
        ->get();

    return DataTables::of($collections)
        ->addColumn('action', function ($collection) {
            $html = '
            <a href="'.url('koleksiView')."/".$collection->id.'">
            <i class="fas fa-edit"></i>
            </a>';

            return $html;
        })
        ->make(true);
}

public function update(Request $request, Collection $collections) //controller buat edit
    {
    $request->validate([
        'namaKoleksi' => 'required',
        'jenisKoleksi' => 'required|in:1,2,3',
        'jumlahKoleksi' => 'required|numeric',
    ]);
    
    // Perbarui data koleksi dengan data yang dikirimkan dari formulir
    
    $affacted = DB::table('collections')->where('id', $request->id)->update([
        'namaKoleksi' => $request->namaKoleksi,
        'jenisKoleksi' => $request->jenisKoleksi,
    ]
    );
    // Redirect ke halaman yang sesuai, misalnya, halaman daftar koleksi
    return redirect()->route('koleksi.daftarKoleksi')->with('success', 'Koleksi berhasil diperbarui.');
    }


}
// Nama : Putri Rahel Patrisia
// NIM : 6706223161

