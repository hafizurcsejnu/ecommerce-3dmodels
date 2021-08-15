<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\DataLookupController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\UsersExportController;


use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\FileController;
use App\Http\Middleware\admin;
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

Route::get('3dmodels',[ProductController::Class,'shop'])->name('3dmodels');
Route::get('3dmodels',[ProductController::Class,'shop'])->name('shop');

Route::get('freebies',[ProductController::Class,'freebies'])->name('freebies');
Route::get('services', function () {
    return view('services');  
});


Route::get('3dmodels-category/{id}',[ProductController::Class,'shopCategory']);
Route::get('3dmodels-subcategory/{id}',[ProductController::Class,'shopSubCategory']);
Route::get('quick-view/{id}',[ProductController::Class,'quickView']); 

Route::get('product/{id}',[ProductController::Class,'show']);
Route::get('3dmodels-category/product/{id}',[ProductController::Class,'show']);
Route::post('search_product',[ProductController::class,'search_product']);

// Route::get('download-max/{id}',[ProductController::Class,'downloadMax']);
// Route::get('download-fbx/{id}',[ProductController::Class,'downloadFbx']);
// Route::get('download-obj/{id}',[ProductController::Class,'downloadObj']);
// Route::get('download-blend/{id}',[ProductController::Class,'downloadBlend']);
// Route::get('download-c4d/{id}',[ProductController::Class,'downloadC4dx']);

Route::get('sets',[ProductController::Class,'sets']);

Route::get('all-collections',[CollectionController::Class,'shop']);
Route::get('collection/{id}',[CollectionController::Class,'show']);

//wishlist
Route::post('add-to-wishlist',[WishListController::Class,'addToWishlist'])->name('add-to-wishlist');
// Route::post('3dmodels-category/add-to-wishlist',[WishListController::Class,'addToWishlist'])->name('add-to-wishlist');
 

//cart option
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

Route::post('create-payment',[PaymentController::class,'createPayment'])->name('create-payment');
Route::get('execute-payment',[PaymentController::class,'execute']);
Route::post('stripe',[PaymentController::class,'stripePayment'])->name('stripe.post');

Route::get('send_email',[PaymentController::class,'testMail']); 


Route::get('/login', function () {
    //dd(session('user.user_type'));
    if(session('user.user_type') == 'User'){
        if(session('source')=='cart'){
            return redirect('/checkout');
        }
        return redirect('/');
    }
    else if(session('user.user_type') == 'Admin'){
        return redirect('/admin');
    }
    return view('user_login');
})->name('login');


Route::get('/dashboard', function(){
    if(session('user.user_type') == 'User'){
        return view('home');
    }
    else if(session('user.user_type') == 'Admin'){
        return redirect('/admin');
    }
    return redirect('/login')->name('login');
});

Route::get('/admin', function(){
    if(session('user.user_type') == 'Admin'){
        return view('admin.index');
    }
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

Route::get('verify', [UserController::class, 'verifyUser'])->name('verify.user');

Route::post('reset-password', [UserController::class, 'resetPassword']);
Route::get('reset', [UserController::class, 'resetPass'])->name('reset');
Route::view('new-password', 'new_password')->name('newPassword');
Route::post('new-password-store', [UserController::class, 'newPasswordStore']);

Route::post('coupon_execution',[CouponController::class,'checkCoupon']);

// user
Route::middleware([user::class])->group(function () {

    Route::get('download/{id}/{source}',[ProductController::Class,'download']);
    Route::get('freebees-download/{id}',[ProductController::Class,'freebeesDownload']);

    // resume section
    Route::get('profile', [UserController::class, 'edit']);
    Route::post('update-user', [UserController::class, 'update']);

    Route::post('update_user', [UserController::class, 'update_user']);
    
    //customer
    Route::get('/my-account', [UserController::Class,'myAccount']); 
    Route::get('/my-wishlist', [WishListController::Class,'myWishlist']); 
    Route::post('/wishlist_remove', [WishListController::Class,'destroy']); 

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


/************************************************************
 admin section
 ************************************************************/

Route::middleware([admin::class])->group(function () {
    Route::get('profile', [UserController::class, 'edit']);
    Route::post('update-user', [UserController::class, 'update']);
    
    Route::view('resume-list', 'resume_list');
    Route::resource('sections', SectionController::class);

    Route::get('templates', [TemplateController::class, 'index']);
    Route::post('template_store', [TemplateController::class, 'store']);
    Route::post('template_update', [TemplateController::class, 'update']);
    Route::get('template_delete/{id}', [TemplateController::class, 'destroy']);

    Route::get('users', [UserController::class, 'index']);

    Route::post('change_user_status', [UserController::class, 'change_user_status']);
    Route::post('storeUser', [UserController::class, 'storeUser']);
    Route::post('updateUser', [UserController::class, 'updateUser']);
    Route::get('delete-user/{id}', [UserController::class, 'deleteUser']);

    /*blog_category*/
    Route::get('/blog-categories', [BlogCategoryController::class, 'index']);
    Route::post('/store_blog_category', [BlogCategoryController::class, 'store']);
    Route::post('/update_blog_category', [BlogCategoryController::class, 'update']);
    Route::get('/delete_blog_category/{id}', [BlogCategoryController::class, 'destroy']);

    /*data_lookup*/
    Route::get('/data-lookup', [DataLookupController::class, 'index']);
    Route::post('/store_data_lookup', [DataLookupController::class, 'store']);
    Route::post('/update_data_lookup', [DataLookupController::class, 'update']);
    Route::get('/delete_data_lookup/{id}', [DataLookupController::class, 'destroy']);

    /*blog*/
    Route::get('/blogs', [BlogController::class, 'blogs']);
    Route::get('/add-blog', [BlogController::class, 'create']);
    Route::post('/save_blog', [BlogController::class, 'store']);
    Route::get('/edit-blog/{id}', [BlogController::class, 'edit']);
    Route::post('/update_blog', [BlogController::class, 'update']);
    Route::get('/delete-blog/{id}', [BlogController::class, 'destroy']);

    /*product_category*/
    Route::get('/product-categories', [ProductCategoryController::class, 'index']);
    Route::post('/store_product_category', [ProductCategoryController::class, 'store']);
    Route::post('/update_product_category', [ProductCategoryController::class, 'update']);
    Route::get('/delete_product_category/{id}', [ProductCategoryController::class, 'destroy']);

    /*coupon*/
    Route::get('/coupons', [CouponController::class, 'index']);
    Route::post('/store_coupon', [CouponController::class, 'store']);
    Route::post('/update_coupon', [CouponController::class, 'update']);
    Route::get('/delete_coupon/{id}', [CouponController::class, 'destroy']);


    /*product*/
    Route::get('/products', [ProductController::class, 'products']);
    Route::get('/add-product', [ProductController::class, 'create']);
    Route::post('/save_product', [ProductController::class, 'store'])->name('save_product');
    Route::post('/upload_product', [ProductController::class, 'upload'])->name('upload_product');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
    Route::post('/update_product', [ProductController::class, 'update']);
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy']);
    Route::post('/upload_price', [ProductController::class, 'updatePrice'])->name('update_price');


    /*collection*/
    Route::get('/collections', [CollectionController::class, 'index']);
    Route::get('/add-collection', [CollectionController::class, 'create']);
    Route::post('/save_collection', [CollectionController::class, 'store'])->name('save_collection');
    Route::post('/upload_collection', [CollectionController::class, 'upload'])->name('upload_collection');
    Route::get('/edit-collection/{id}', [CollectionController::class, 'edit']);
    Route::post('/update_collection', [CollectionController::class, 'update']);
    Route::get('/delete-collection/{id}', [CollectionController::class, 'destroy']);

    Route::post('find_subcategory',[ProductController::class,'find_subcategory']);
    Route::post('find_product_id',[ProductController::class,'find_product_id']);

    /*reporting*/
    
    Route::get('sales-report', function () {
        return view('admin/report_sales'); 
    });
    Route::post('/sales_report', [ReportingController::class, 'sales']);
    Route::post('/export-excel', [ReportingController::class, 'exportExcel']);
    Route::get('users/export/', [ReportingController::class, 'exportUser']);
    Route::post('/export-pdf', [ReportingController::class, 'exportPDF']);





    Route::get('dropzone', [DropzoneController::class, 'index']);
    Route::post('dropzone/upload', [DropzoneController::class, 'upload'])->name('dropzone.upload');
    Route::get('dropzone/fetch', [DropzoneController::class, 'fetch'])->name('dropzone.fetch');
    Route::get('dropzone/delete', [DropzoneController::class, 'delete'])->name('dropzone.delete');



    /*class*/   
    Route::get('/class', [ClassController::class, 'index']);
    Route::get('/add-class', [ClassController::class, 'create']);
    Route::post('/save_class', [ClassController::class, 'store']);
    Route::get('/edit-class/{id}', [ClassController::class, 'edit']);
    Route::post('/update_class', [ClassController::class, 'update']);
    Route::get('/delete-class/{id}', [ClassController::class, 'destroy']);

   
    /*page*/
    Route::get('/page', [PageController::class, 'index']);
    Route::get('/pages', [PageController::class, 'index']);
    Route::get('/add-page', [PageController::class, 'create']);
    Route::post('/save_page', [PageController::class, 'store']);
    Route::get('/edit-page/{id}', [PageController::class, 'edit']);
    Route::post('/update_page', [PageController::class, 'update']);
    Route::get('/delete-page/{id}', [PageController::class, 'destroy']);


});












