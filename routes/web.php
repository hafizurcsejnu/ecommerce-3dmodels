<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CollectionController;


use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\FileController;
use App\Http\Middleware\user;
use App\Models\Page;

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

// Route::get('/', function () {
//     return view('home'); 
// });  

Route::get('/', [HomeController::class, 'index']);
Route::get('/classes', [ClassController::class, 'classes']);
Route::get('blog',[BlogController::Class,'index']);
Route::get('blog/{id}',[BlogController::Class,'show']);
Route::get('page/{id}',[PageController::Class,'show']);

Route::get('shop',[ProductController::Class,'shop'])->name('shop');
Route::get('freebies',[ProductController::Class,'freebies'])->name('freebies');
Route::get('services', function () {
    return view('services'); 
});


Route::get('shop-category/{id}',[ProductController::Class,'shopCategory']);
Route::get('shop-subcategory/{id}',[ProductController::Class,'shopSubCategory']);
Route::get('quick-view/{id}',[ProductController::Class,'quickView']); 

Route::get('product/{id}',[ProductController::Class,'show']);
Route::get('download/{id}/{source}',[ProductController::Class,'download']);

Route::post('search_product',[ProductController::class,'search_product']);

// Route::get('download-max/{id}',[ProductController::Class,'downloadMax']);
// Route::get('download-fbx/{id}',[ProductController::Class,'downloadFbx']);
// Route::get('download-obj/{id}',[ProductController::Class,'downloadObj']);
// Route::get('download-blend/{id}',[ProductController::Class,'downloadBlend']);
// Route::get('download-c4d/{id}',[ProductController::Class,'downloadC4dx']);

Route::get('sets',[ProductController::Class,'sets']);

Route::get('all-collections',[CollectionController::Class,'shop']);
Route::get('collection/{id}',[CollectionController::Class,'show']);


 

//cart option
Route::post('product/add-to-wishlist',[WishListController::Class,'addToWishlist'])->name('add-to-wishlist');
Route::post('shop-subcategory/add-to-wishlist',[WishListController::Class,'addToWishlist'])->name('add-to-wishlist');
Route::post('shop-subcategory/add-to-cart',[CheckoutController::Class,'AddToCart'])->name('add-to-cart');
Route::post('shop-subcategory/update-cart',[CheckoutController::Class,'updateCartItem'])->name('update-cart');

Route::post('product/remove-cart-item',[CheckoutController::Class,'removeCartItem'])->name('remove-cart-item');


Route::post('shop-category/add-to-cart',[CheckoutController::Class,'AddToCart'])->name('add-to-cart');
Route::post('shop-category/update-cart',[CheckoutController::Class,'updateCartItem'])->name('update-cart');
Route::post('shop-category/remove-cart-item',[CheckoutController::Class,'removeCartItem'])->name('remove-cart-item');

Route::post('shop/add-to-cart',[CheckoutController::Class,'AddToCart'])->name('add-to-cart');
Route::post('shop/update-cart',[CheckoutController::Class,'updateCartItem'])->name('update-cart');
Route::post('shop/remove-cart-item',[CheckoutController::Class,'removeCartItem'])->name('remove-cart-item');


Route::get('get-cart-total',[CheckoutController::class,'getCartTotal'])->name('get-cart-total');
Route::get('cart',function(){
    return view('cart');
});
Route::get('payment',[CheckoutController::class,'payment'])->name('payment');


/*checkout*/
Route::get('checkout',[CheckoutController::Class,'index']); 
Route::post('/customer-registration', 'CheckoutController@customerRegistration');
Route::post('/customer-signin', 'CheckoutController@customerSignin');

Route::get('/billing-address', 'CheckoutController@billingAddress');
Route::get('/shipping-address', 'CheckoutController@shippingAddress');
Route::post('/save-billing', 'CheckoutController@saveBilling');
Route::post('/save-shipping', 'CheckoutController@saveShipping');
Route::get('/payment', 'CheckoutController@payment');
//Route::post('/save-payment', 'CheckoutController@savePayment');
Route::get('/save-payment', 'CheckoutController@savePayment');



/*orders*/
Route::get('/orders', 'AdminController@orders');
Route::post('/update-order-status', 'AdminController@updateOrderStatus');




Route::get('/login', function () {
    //dd(session('user.user_type'));
    if(session('user.user_type') == 'User'){
        if(session('source')=='cart'){
            return redirect('/checkout');
        }
        return redirect('/');
    }
  
    return view('user_login');
})->name('login');


Route::get('/dashboard', function(){
    if(session('user.user_type') == 'User'){
        return view('home');
    }
    return redirect('/login')->name('login');
});

Route::get('/admin', function(){
   
    return redirect('/login')->name('login');

});

// logout
// Route::get('/logout', function(){
//     if(session()->has('user')){
//         session()->pull('user');
//     }
//     return redirect('/login')->name('login');
// })->name('logout');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::view('no-access', 'no_access');
Route::view('contact', 'contact');
Route::view('test', 'layouts/test');
Route::post('contact_form', [UserController::class, 'contactForm']);

/*user section*/
Route::post('create_user', [UserController::class, 'store']);
//Route::view('login', 'user_login')->name('login');
Route::post('access-user', [UserController::class, 'login']);


Route::view('main', 'home_main');

Route::post('coupon_execution',[CouponController::class,'checkCoupon']);

// user
Route::middleware([user::class])->group(function () {
    // resume section
  
    //customer
    Route::get('/my-account', [UserController::Class,'myAccount']); 
    Route::get('/my-wishlist', [WishListController::Class,'myWishlist']); 

    /**
     * Routes for Folder CRUD
     */
    Route::get('my-documents', [FolderController::class, 'index']);
    Route::get('get-folder-by-id/{folderId}', [FolderController::class, 'getFolderById']);
    Route::post('create-folder',[FolderController::class, 'create']);
    Route::post('sorting-folder',[FolderController::class, 'sorting']);
    Route::post('rename-folder',[FolderController::class, 'renameFolder']);
    Route::delete('delete-folder/{folderId}',[FolderController::class, 'deleteFolder']);
    Route::get('get-tree-data', [FolderController::class, 'getTreeData']);
    Route::post('upload', [FileController::class, 'create'])->name('createFile');
    Route::post('rename-file',[FileController::class, 'renameFile']);
    Route::delete('delete-file/{fileId}',[FileController::class, 'deleteFile']);
    Route::get('get-folder-files/{type}/{folderId}', [FileController::class, 'getFolderFiles']);
    Route::get('get-file-by-id/{fileId}', [FileController::class, 'getFileById']);
    Route::POST('copy-file', [FileController::class, 'copyFile']);
    Route::get('check-file-exist/{folderId}', [FolderController::class, 'checkFileExist']);
    Route::get('download/{fileId}', [FileController::class, 'download']);
});









