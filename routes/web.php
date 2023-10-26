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