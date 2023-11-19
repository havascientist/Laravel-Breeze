<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Collection;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    //tampilkan view aja
    public function index() {
        return view('transaction.daftarTransaksi');
        }

    //mengambil data untuk di tampilkan di view daftar transaksi
        public function getAllTransactions() {
            $data = Transaction::select([
               'transactions.id as id',
               'u1.fullname as peminjam',
               'u2.fullname as petugas',
               'tanggalPinjam',
               'tanggalSelesai'
            ])
            ->join('users as u1', 'transactions.userIdPeminjam', '=', 'u1.id')
            ->join('users as u2', 'transactions.userIdPetugas', '=', 'u2.id')
            ->orderBy('tanggalPinjam', 'asc')
            ->get();
         
            return Datatables::of($data)->make(true);
         }

    //Menampilkan view tambah transaksi
         public function create()
         {
         $users = User::get();
         $Collection = Collection::where('jumlahKoleksi', '>', 0)->get();
         return view('transaction.create', compact('Collection', 'users'));
         }

    //Menyimpan data yang di tambahkan
         public function store(Request $request)
         {
             $request->validate([
                 'idPeminjam' => 'required|integer|gt:0',
                 'koleksi1' => 'required|integer|gt:0'
             ],
             [
                 'idPeminjam.gt' => 'Pilih satu Species',
                 'koleksi1.gt' => 'Pilih jenis Item'
             ]);
         
             // Membuat objek transaction dan menyimpannya dalam tabel transactions
             $transaction = new Transaction;
             $transaction->userIdPeminjam = $request->idPeminjam;
             $transaction->userIdPetugas = auth()->user()->id;
             $transaction->tanggalPinjam = Carbon::now()->toDateString();
             $transaction->save();
         
             // Mengambil id transaksi terakhir untuk digunakan pada proses insert detail transaction
             $lastTransactionIdStored = $transaction->id;
         
             // Membuat objek detail transaction dan menyimpannya dalam tabel detail_transactions
             // Peminjaman koleksi 1
             $detilTransaksi1 = new DetailTransaction;
             $detilTransaksi1->transactionId = $lastTransactionIdStored;
             $detilTransaksi1->collectionId = $request->koleksi1;
             $detilTransaksi1->status = 1;
             $detilTransaksi1->save();
         
            if($request->koleksi2 > 0){
             $detilTransaksi2 = new DetailTransaction;
             $detilTransaksi2->transactionId = $lastTransactionIdStored;
             $detilTransaksi2->collectionId = $request->koleksi2;
             $detilTransaksi2->status = 1;
             $detilTransaksi2->save();
            }
            if($request->koleksi3 > 0){
             $detilTransaksi3 = new DetailTransaction;
             $detilTransaksi3->transactionId = $lastTransactionIdStored;
             $detilTransaksi3->collectionId = $request->koleksi3;
             $detilTransaksi3->status = 1;
             $detilTransaksi3->save();
            }
            return redirect()->route('daftarTransaksi')->with('success', 'Koleksi berhasil diperbarui.');
            }

            public function show($id)
            {
                $transactions = DB::table('transactions')
                    ->select(
                        'transactions.id as id',
                        'u1.fullname as fullnamePeminjam',
                        'u2.fullname as fullnamePetugas',
                        'tanggalPinjam as tanggalPinjam',
                        'tanggalSelesai as tanggalSelesai'
                    )
                    ->join('users as u1', 'userIdPeminjam', '=', 'u1.id')
                    ->join('users as u2', 'userIdPetugas', '=', 'u2.id')
                    ->where('transactions.id', '=', $id)
                    ->orderBy('tanggalPinjam', 'asc')
                    ->first();
            
                    //  dd($transactions);
                return view('detailTransaksi.transaksiDetail', compact('transactions'));
            }
}


