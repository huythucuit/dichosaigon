<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

use Iluminate\Http\Request;


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

// Route::get('/index', function () {
//     return view('product.index');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(ProductController::class)->group(function () {
    Route::get('/index', 'Index')->name('index');
    Route::get('/managepost', 'ManagePost')->name('managepost');
    Route::get('/editpost/{productID}', 'EditPost')->name('editpost');
    Route::post('/updatepost', 'UpdatePost')->name('updatepost');
    Route::get('/deletepost/{Id}', 'DeletePost')->name('deletepost');
    Route::get('/admin/search-product',  'SearchCategory')->name('searchproduct');
    Route::get('/search',  'SearchProduct')->name('search');
    Route::get('/createpost', 'CreatePost')->name('createpost');
    Route::post('/storepost', 'StorePost')->name('storepost');


    Route::post('/admin/update-product-img', 'UpdateProductImg')->name('updateproductimg');
    Route::get('/admin/edit-product-img/{productID}', 'EditProductImg')->name('editproductimg');
 });

