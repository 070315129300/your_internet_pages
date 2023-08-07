<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagesController;

use App\Http\Controllers\PromoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard',[PagesController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//pages
Route::get('/', [PagesController::class,'index']);
Route::get('productpage', [PagesController::class,'productpage']);
Route::get('cartpage', [PagesController::class,'cartpage'])->middleware(['auth', 'verified']);
Route::get('contact', [PagesController::class,'contact']);
Route::get('checkoutpage', [PagesController::class,'checkoutpage'])->middleware(['auth', 'verified']);
Route::get('singleproduct/{id}', [PagesController::class,'singleproduct']);
Route::get('/dashboard',[PagesController::class,'redirect']);


// user
Route::get('getAllUser',[UserController::class, 'getAllUser'])->middleware(['auth', 'verified']);
Route::get('getAUser/id',[UserController::class, 'getAUser']);
Route::patch('updateUser/id', [UserController::class, 'updateUser']);
Route::delete('deleteAUser/id', [UserController::class, 'deleteAUser']);
//banner
Route::get('createBanner', [BannerController::class, 'createBanner']);
Route::post('storeBanner', [BannerController::class, 'storeBanner']);
Route::get('listAllBanner', [BannerController::class, 'listAllBanner']);
Route::delete('deleteABanner', [BannerController::class, 'deleteABanner']);
//promo
Route::get('createPromo', [PromoController::class, 'createPromo']);
Route::post('storePromo', [PromoController::class, 'storePromo']);
Route::get('listAllPromo', [PromoController::class, 'listAllPromo']);
Route::delete('deleteAPromo', [PromoController::class, 'deleteAPromo']);

// Category
Route::post('createCategory', [CategoryController::class, 'createCategory']);
Route::post('editCategory/{id}', [CategoryController::class, 'editCategory']);
Route::get('listAllCategory', [CategoryController::class, 'listAllCategory']);
Route::delete('deleteACategory', [CategoryController::class, 'deleteACategory']);
//Brand
Route::post('createBrand', [BrandController::class, 'createBrand']);
Route::post('editBrand/{id}', [BrandController::class, 'editBrand']);
Route::get('listAllBrand', [BrandController::class, 'listAllBrand']);
Route::delete('deleteABrand', [BrandController::class, 'deleteABrand']);
// product
Route::get('listAllProducts',[ProductController::class, 'listAllProducts']);
Route::get('listAProducts/id',[ProductController::class, 'listAProducts']);
Route::patch('updateProduct/id', [ProductController::class, 'updateProduct']);
Route::delete('deleteAProduct/id', [ProductController::class, 'deleteAProduct']);
Route::post('createProduct', [ProductController::class, 'createProduct']);
//cart
Route::post('/addcart/{id}', [CartController::class, 'addcart'])->middleware(['auth', 'verified']);
Route::get('removecart/{id}', [CartController::class, 'removecart'])->middleware(['auth', 'verified']);
Route::delete('deletecart/{id}', [CartController::class, 'deletecart'])->middleware(['auth', 'verified']);
Route::get('addquantity/{id}',[CartController::class, 'addquantity'])->middleware(['auth', 'verified']);
Route::get('removequantity/{id}',[CartController::class, 'removequantity'])->middleware(['auth', 'verified']);

//Payment
Route::post('payondelivery',[CartController::class,'payondelivery'])->middleware(['auth', 'verified']);
Route::post('pay',[PaymentController::class,'redirectToGateway'])->name('pay');
Route::get('paymentcallback', [PaymentController::class, 'handleGatewayCallback'])->name('name.callback');
//admin panel
Route::get('indexadmin', [AdminController::class, 'indexadmin'])->middleware(['auth', 'verified']);
Route::get('product',[AdminController::class,'product'])->middleware(['auth', 'verified']);
Route::get('addproduct', [AdminController::class,'addproduct'])->middleware(['auth', 'verified']);
Route::get('message', [AdminController::class, 'message']);
Route::get('team', [AdminController::class, 'team']);
Route::get('orders', [AdminController::class, 'order'])->middleware(['auth', 'verified']);
Route::post('addmessage', [AdminController::class, 'addmessage']);
Route::get('category', [AdminController::class, 'category']);
Route::get('brand', [AdminController::class, 'brand']);

