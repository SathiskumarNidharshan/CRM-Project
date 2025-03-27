<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProposalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::resource('/customer', CustomerController::class);
Route::patch('/customer/{id}/status', [CustomerController::class, 'changeStatus'])->name('customer.changeStatus');

Route::resource('/proposal', ProposalController::class);
Route::patch('/proposal/{id}/status', [ProposalController::class, 'changeStatus'])->name('proposal.changeStatus');

Route::resource('/invoice', InvoiceController::class);
Route::patch('/invoice/{id}/status', [InvoiceController::class, 'changeStatus'])->name('invoice.changeStatus');
Route::get('/invoice/{id}/send', [InvoiceController::class, 'sendInvoice'])->name('invoice.send');
Route::get('/invoice/pay/{id}', [StripePaymentController::class, 'createCheckoutSession'])->name('invoice.pay');
Route::get('/stripe/success/{id}', [StripePaymentController::class, 'success'])->name('stripe.success');
Route::get('/stripe/cancel', [StripePaymentController::class, 'cancel'])->name('stripe.cancel');



Route::resource('transaction', TransactionController::class);

// Display all transactions
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');

// Display transactions of a specific customer
Route::get('/transaction/customer/{customer}', [TransactionController::class, 'show'])->name('transaction.show');

// Show detailed information of a specific transaction
Route::get('/transaction/{id}', [TransactionController::class, 'showTransaction'])->name('transaction.details');


require __DIR__ . '/auth.php';
