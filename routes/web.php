<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\PembayaranApprovalController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Sales\KunjunganController;
use App\Http\Controllers\Sales\PembayaranController;
use App\Http\Controllers\Sales\CheckinController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Guest routes (no auth required)
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/loginPost', [UserController::class, 'loginPost'])->name('login.post');

// Protected routes (require auth session)
Route::middleware(['auth.session'])->group(function () {
    
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Logout
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    
    // Barang routes
    Route::get('/listbarang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/createbarang', [BarangController::class, 'create'])->middleware('role:admin')->name('barang.create');
    Route::post('/storebarang', [BarangController::class, 'store'])->middleware('role:admin')->name('barang.store');
    Route::get('/detailbarang/{kdbrg}', [BarangController::class, 'detail'])->name('barang.detail');
    Route::get('/editbarang/{kdbrg}', [BarangController::class, 'edit'])->middleware('role:admin')->name('barang.edit');
    Route::put('/updatebarang/{kdbrg}', [BarangController::class, 'update'])->middleware('role:admin')->name('barang.update');
    Route::delete('/deletebarang/{kdbrg}', [BarangController::class, 'destroy'])->middleware('role:admin')->name('barang.destroy');
    
    // Customer routes (admin only for mutation)
    Route::get('/listcustomer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/detailcustomer/{kdcust}', [CustomerController::class, 'detail'])->name('customer.detail');
    Route::get('/createcustomer', [CustomerController::class, 'create'])->middleware('role:admin')->name('customer.create');
    Route::post('/storecustomer', [CustomerController::class, 'store'])->middleware('role:admin')->name('customer.store');
    Route::get('/editcustomer/{kdcust}', [CustomerController::class, 'edit'])->middleware('role:admin')->name('customer.edit');
    Route::put('/updatecustomer/{kdcust}', [CustomerController::class, 'update'])->middleware('role:admin')->name('customer.update');
    Route::delete('/deletecustomer/{kdcust}', [CustomerController::class, 'destroy'])->middleware('role:admin')->name('customer.destroy');
    
    // Order routes (list & detail for all authenticated users)
    Route::get('/listorder', [OrderController::class, 'index'])->name('order.index');
    Route::get('/detailorder/{noent}', [OrderController::class, 'detail'])->name('order.detail');
    
    // Order creation (sales only)
    Route::get('/tambahorder2', [OrderController::class, 'tambah2'])->middleware('role:sales')->name('order.tambah2');
    Route::post('/simpanorder2', [OrderController::class, 'simpan'])->middleware('role:sales')->name('order.simpan2');

    // Sales routes
    Route::prefix('sales')->name('sales.')->middleware('role:sales')->group(function () {
        Route::get('/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan.index');
        Route::get('/kunjungan/create', [KunjunganController::class, 'create'])->name('kunjungan.create');
        Route::post('/kunjungan', [KunjunganController::class, 'store'])->name('kunjungan.store');
        Route::get('/kunjungan/{id}', [KunjunganController::class, 'show'])->name('kunjungan.show');

        Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
        Route::get('/pembayaran/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
        Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');

        Route::get('/checkin', [CheckinController::class, 'index'])->name('checkin.index');
        Route::get('/checkin/create', [CheckinController::class, 'create'])->name('checkin.create');
        Route::post('/checkin', [CheckinController::class, 'store'])->name('checkin.store');
    });

    // Admin approval pembayaran
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        Route::get('/pembayaran-approval', [PembayaranApprovalController::class, 'index'])->name('pembayaran.index');
        Route::post('/pembayaran-approval/{id}/approve', [PembayaranApprovalController::class, 'approve'])->name('pembayaran.approve');
        Route::post('/pembayaran-approval/{id}/reject', [PembayaranApprovalController::class, 'reject'])->name('pembayaran.reject');
        
        // User management
        Route::get('/user', [UserManagementController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UserManagementController::class, 'create'])->name('user.create');
        Route::post('/user', [UserManagementController::class, 'store'])->name('user.store');
        Route::get('/user/{id}/edit', [UserManagementController::class, 'edit'])->name('user.edit');
        Route::put('/user/{id}', [UserManagementController::class, 'update'])->name('user.update');
        Route::delete('/user/{id}', [UserManagementController::class, 'destroy'])->name('user.destroy');
    });
    
});
