<?php
use App\DataTables\KoleksiDataTable;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollectionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); 
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/user', [UserController::class, 'index'])->name('user.daftarPengguna');
Route::get('/getData', [UserController::class, 'getData'])->name('user.getData');
Route::get('/userRegistration', [UserController::class, 'create'])->name('user.registrasi');
Route::post('/userStore', [UserController::class, 'store'])->name('user.infoPengguna');
Route::get('/userView/{user}', [UserController::class, 'show'])->name('user.infoPengguna');
Route::match(['get', 'post'], '/koleksiTambah', [CollectionController::class, 'create'])->name('koleksi.registrasi');
Route::post('/koleksiStore', [CollectionController::class, 'store'])->name('koleksi.store');
Route::get('/koleksiView/{collection}', [CollectionController::class, 'show'])->name('koleksi.infoKoleksi');
Route::put('/koleksiUpdate', [CollectionController::class, 'update'])->name('koleksi.update');
Route::put('/userUpdate', [UserController::class, 'update'])->name('user.update');

Route::get('/koleksi', [CollectionController::class, 'index'])->name('koleksi.daftarKoleksi');
Route::get('/getKoleksi', [CollectionController::class, 'getKoleksi'])->name('getKoleksi');


use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DetailTransactionController;

route::get('/transaksi',[TransactionController::class, 'index'])->middleware(['auth', 'verified'])->name('daftarTransaksi');
route::get('/transaksiTambah', [TransactionController::class, 'create'])->middleware(['auth', 'verified'])->name('transaksiTambah');

route::get('/getAllTransactions',[TransactionController::class, 'getAllTransactions'])->middleware(['auth', 'verified'])->name('getAllTransactions');
route::post('/transaksiStore',[TransactionController::class, 'store'])->middleware(['auth', 'verified'])->name('transaksiStore');
route::get('/transaksiView/{id}',[TransactionController::class, 'show'])->middleware(['auth', 'verified'])->name('infoTransaksi');

//Detail
Route::get('/getAllDetailTransactions/{id}',[DetailTransactionController::class, 'getAllDetailTransactions'])->middleware(['auth', 'verified'])->name('detailTransaksi');
Route::get('/detailTransaksiKembali/{id}', [DetailTransactionController::class, 'edit'])->name('detailTransaksi.pengembalian');
Route::put('detailTransaksitransaksiUpdate', [DetailTransactionController::class, 'update'])->name('detailTransaksi.update');
// Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaction.daftarTransaksi');
// route::get('/transaksi', [TransactionController::class, 'index'])->middleware(['auth', 'verified'])->name('transaksi');
// route::get('/getAllTransactions', [TransactionController::class, 'getAllTransactions'])->middleware(['auth', 'verified']);

// Route::get('/transaksiTambah', [TransactionController::class, 'create'])->name('transaction.transaksiTambah');
// Route::post('/transaksiStore', [TransactionController::class, 'store'])->name('transaction.daftarTransaksi');
// Route::get('/transaksiView/{transaction}', [TransactionController::class, 'show'])->name('transaction.transaksiView');

// Route::get('/detailTransactionKembalikan/{detailTransactionId}', [DetailTransactionController::class, 'detailTransactionKembalikan'])->name('detailTransaction.detailTransactionKembalikan');
// Route::post('/detailTransactionUpdate', [DetailTransactionController::class, 'update'])->name('transaction.transaksiView');


