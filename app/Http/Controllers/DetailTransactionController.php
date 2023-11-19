<?php

namespace App\Http\Controllers;


namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class DetailTransactionController extends Controller
{
    public function getAllDetailTransactions($id) {
        $detail_transactions = DB::table('detail_transactions as dt')
            ->select(
                'dt.id',
                'dt.tanggalKembali as tanggalKembali',
                't.tanggalPinjam as tanggalPinjam',
                'dt.status as statusType',
                DB::raw("(
                    CASE
                    WHEN dt.status = 1 THEN 'Pinjam'
                    WHEN dt.status = 2 THEN 'Kembali'
                    WHEN dt.status = 3 THEN 'Hilang'
                    END
                ) as status"),
                'c.namaKoleksi as koleksi'
            )
            ->join('collections as c', 'c.id', '=', 'dt.collectionId')
            ->join('transactions as t', 't.id', '=', 'dt.transactionId')
            ->where('dt.transactionId', '=', $id)
            ->get();

            return Datatables::of($detail_transactions)->make(true);
    }

    public function edit($id)
    {
    $detailTransaction = DB::table('detail_transactions as dt')
        ->select(
            't.id as idTransaksi',
            'dt.id as id',
            'dt.tanggalKembali as tanggalKembali',
            't.tanggalPinjam as tanggalPinjam',
            'dt.status',
            'uPinjam.fullname as namaPeminjam',
            'uTugas.fullname as namaPetugas',
            'c.namaKoleksi as koleksi'
        )
        ->join('collections as c', 'c.id', '=', 'dt.collectionId')
        ->join('transactions as t', 't.id', '=', 'dt.transactionId')
        ->join('users as uPinjam', 't.userIdPeminjam', '=', 'uPinjam.id')
        ->join('users as uTugas', 't.userIdPetugas', '=', 'uTugas.id')
        ->where('dt.id', '=', $id)
        ->first();

    return view('detailTransaksi.detailTransaksiKembalian', compact('detailTransaction'));
    }


    public function update(Request $request, DetailTransaction $DetailTransaction)
    {
    $request->validate([
        'status' => 'required|in:1,2,3',
    ]);

    $affected = DB::table('detail_transactions')->where('id', $request->id)->update(
        [
            'status' => $request->status,
            'tanggalKembali' => Carbon::now()->toDateString(),
        ]
    );
    if ($request->status == 2) {
        $transactions = Transaction::find($DetailTransaction->transactionsId);

        if ($transactions) {
            $transactions->status = $request->status;
            $transactions->tanggalSelesai = Carbon::now()->toDateString();
            $transactions->save();
        }
    }
    return redirect()->route('daftarTransaksi')->with('success', 'Transaksi berhasil diperbarui!');
}



}
