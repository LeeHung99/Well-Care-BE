<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckOutController;
use Illuminate\Session\Middleware\StartSession;


Route::prefix('/cate')->group(function () {
    Route::get('/', [ProductController::class, 'cate']);
});
Route::prefix('/product')->group(function () {
    Route::get('/', [ProductController::class, 'product']);
    Route::get('{id_product}', [ProductController::class, 'productDetail']);
});
Route::get('sale', [ProductController::class, 'productSale']);
Route::get('hot', [ProductController::class, 'productHot']);
Route::get('sold', [ProductController::class, 'productSold']);
Route::get('voucher', [ProductController::class, 'voucher']);
Route::get('sick', [ProductController::class, 'sick']);
Route::get('object', [ProductController::class, 'object']);
Route::get('banner', [ProductController::class, 'banner']);
Route::get('productsick{id_sick}', [ProductController::class, 'productsick']);
Route::get('/productcate{id_category}', [ProductController::class, 'productCate']);
Route::get('img_product/{id_product}', [ProductController::class, 'imgProduct'])->name('img_product');
Route::get('bill', [ProductController::class, 'bill']);
Route::put('bill', [ProductController::class, 'updateBill']);
Route::get('billdetail{id_bill}', [ProductController::class, 'billdetail']);
Route::get('comment', [ProductController::class, 'comment']);


Route::get('test{id_cate}', [ProductController::class, 'test']);
Route::get('articlePost', [ProductController::class, 'articlePost']);
Route::get('post', [ProductController::class, 'post']);
Route::get('postdetail{id_post}', [ProductController::class, 'postdetail']);
Route::get('user', [ProductController::class, 'user']);
Route::get('postbycate{id_cate}', [ProductController::class, 'postbycate']);
Route::get('userbyid{id_user}', [ProductController::class, 'userbyid']);
Route::put('userbyid{id_user}', [UserController::class, 'updateUser']);
// payment route
Route::post('order', [CheckOutController::class, 'store']);

Route::middleware('api')->post('/loginSMS', [UserController::class, 'send']);
Route::middleware('api')->post('/loginSMS_verify', [UserController::class, 'verify']);
Route::middleware('api')->post('/order_test', [CheckOutController::class, 'store']);
Route::middleware('api')->post('/order_view', [CheckOutController::class, 'test_view_checkout']);
Route::middleware('api')->get('/vnpayCallback/{phoneNumber}', [CheckOutController::class, 'vnpayCallback'])->name('vnpayCallback');
Route::middleware('api', StartSession::class)->get('/momoCallback/{phoneNumber}', [CheckOutController::class, 'momoCallback'])->name('momoCallback');


Route::middleware('api')->post('/comments', [CommentController::class, 'comment']);
// Route::post('loginSMS_verify', [UserController::class, 'verify']);
