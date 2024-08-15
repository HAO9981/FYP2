<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\CusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homePage',
[App\Http\Controllers\ProductController::class,'home'])->name('homePage');

Route::get('/addProduct',function(){
    return view('/addProduct');
});

Route::get('/addProduct/store',function(){
    return view('addProduct');
});

Route::post('/addProduct/store',
[App\Http\Controllers\StaffController::class,'add'])->name('addProduct');

Route::get('/showProduct',
[App\Http\Controllers\ProductController::class,'view'])->name('showProduct');

Route::post('/searchProduct',
[App\Http\Controllers\ProductController::class,'search'])->name('searchProduct');

Route::get('/productDetail/{id}',
[App\Http\Controllers\ProductController::class,'productDetail'])->name('showProductDetail');

Route::get('/editProduct/{id}',
[App\Http\Controllers\StaffController::class,'edit'])->name('editProduct');

Route::post('/updateProduct',
[App\Http\Controllers\StaffController::class,'update'])->name('updateProduct');

Route::get('/viewProduct/delete/{id}',
[App\Http\Controllers\StaffController::class,'delete'])->name('viewProduct.delete');

Route::get('/account',
[App\Http\Controllers\UserController::class,'view'])->name('account');

Route::post('/updateAccount',
[App\Http\Controllers\UserController::class,'update'])->name('updateAccount');

Route::get('/staffRegister',
[App\Http\Controllers\StaffController::class,'showRegisterForm'])->name('staffRegister');

Route::post('/staffRegister', 
[App\Http\Controllers\StaffController::class, 'register'])->name('staffRegister.submit');

Route::get('/staffShowProduct', 
[App\Http\Controllers\StaffController::class, 'view'])->name('staffShowProduct');

Route::get('/staffProductDetail/{id}',
[App\Http\Controllers\StaffController::class,'productDetail'])->name('staffProductDetail');

Route::get('/staffAccount',
[App\Http\Controllers\StaffController::class,'account'])->name('staffAccount');

Route::get('/staffLogin', 
[App\Http\Controllers\StaffController::class, 'showLoginForm'])->name('staffLogin');

Route::post('/staffLogin', 
[App\Http\Controllers\StaffController::class, 'login'])->name('staffLoginPost');

Route::get('/staffMenu', 
[App\Http\Controllers\MenuController::class, 'view'])->name('staffMenu');

Route::get('/addMenu',function(){
    return view('addMenu');
})->name('addMenu');

Route::post('/addMenu/store',
[App\Http\Controllers\MenuController::class,'add'])->name('addMenuPost');

Route::get('/editMenu/{id}',
[App\Http\Controllers\MenuController::class,'edit'])->name('editMenu');

Route::post('/updateMenu',
[App\Http\Controllers\MenuController::class,'update'])->name('updateMenu');

Route::get('/menu/delete/{id}',
[App\Http\Controllers\MenuController::class,'delete'])->name('menu.delete');

Route::get('/menu',
[App\Http\Controllers\MenuController::class,'viewMenu'])->name('menu');

Route::get('/showStock',
[App\Http\Controllers\ProductController::class,'stock'])->name('showStock');

Route::post('/updateStockQuantity',
[App\Http\Controllers\ProductController::class,'updateStockQuantity'])->name('updateStockQuantity');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/addTable',function(){
    return view('addTable');
});

Route::get('/addTable/store',function(){
    return view('addTable');
});

Route::post('/addTable/store',
[App\Http\Controllers\TableController::class,'add'])->name('addTable');

Route::get('/showTable',
[App\Http\Controllers\TableController::class,'show'])->name('showTable');

Route::get('/staffShowTable',
[App\Http\Controllers\TableController::class,'view'])->name('staffShowTable');

Route::get('/editTable/{id}',
[App\Http\Controllers\TableController::class,'edit'])->name('editTable');

Route::post('/updateTable',
[App\Http\Controllers\TableController::class,'update'])->name('updateTable');

Route::get('/viewTable/delete/{id}',
[App\Http\Controllers\TableController::class,'delete'])->name('viewTable.delete');

Route::post('/upload-image', [TableController::class, 'uploadImage'])->name('upload.image');



Route::get('/book/{tableId}', [ReservationController::class, 'book'])->name('reservations.book');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('/reservation/reservationDetail/{reservation}', [ReservationController::class, 'reservationDetail'])->name('reservationDetail');
Route::get('/list', [ReservationController::class, 'list'])->name('list');
Route::get('/list/{reservation}', [ReservationController::class, 'showList'])->name('list.show');
Route::get('/api/available-times', [TableController::class, 'getAvailableTimes']);
Route::get('/table-detail/{id}', [TableController::class, 'showTableDetail'])->name('tableDetail');
Route::get('/book', [TableController::class, 'showBookForm'])->name('bookTable');
Route::get('/get-recent-images', [TableController::class, 'getRecentImages'])->name('getRecentImages');


Route::post('/create-checkout-session', [PaymentController::class, 'createCheckoutSession'])->name('create.checkout.session');
Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');

Route::post('/upload-image', [TableController::class, 'uploadTableImage'])->name('upload.image');
Route::get('/download-pdf/{reservationId}', [PaymentController::class, 'downloadPDF'])->name('download.pdf');
Route::get('/test-pdf', function () {
    return PDF::loadHTML('<h1>Test PDF</h1>')->stream();
});



