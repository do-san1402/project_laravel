<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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


    
    require __DIR__.'/auth.php';

Route::get('/', [IndexController::class, 'show'])->name('index') ;
Route::get('/index', [IndexController::class, 'show'])->name('index');
Route::get('infor/user', [IndexController::class, 'infor_user'])->middleware(['auth'])->name('infor_user');
Route::get('menu/{page}', [PagesController::class, 'menu']) ;
// Danh muc san pham 
Route::get('/danh-muc-san-pham/{id}', [PagesController::class, 'show_category']) ;
// Thuong hieu san pham
Route::get('/thuong-hieu-san-pham/{id}', [PagesController::class, 'show_brand']) ;
// Chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/{id}', [PagesController::class, 'detail_product']) ;
// Sreach 
Route::post('/search', [IndexController::class, 'search']) ;






// Admin
Route::get('/admin', [AdminController::class, function() {
    return view('admin_login');
}]);
Route::middleware(['role', 'roles.author']) ->group(function() {
    //Admin Category Product 
    Route::get('/add-category-product', [CategoryProductController::class, 'add_category_product']) ;
    Route::get('/all-category-product', [CategoryProductController::class, 'all_category_product']) ;
    Route::get('unactive-category-product/{id}', [CategoryProductController::class, 'unactive_category_product']) ;
    Route::get('active-category-product/{id}', [CategoryProductController::class, 'active_category_product']) ;
    Route::get('edit-category-product/{id}', [CategoryProductController::class, 'edit_category_product']) ;
    Route::get('delete-category-product/{id}', [CategoryProductController::class, 'delete_category_product']) ;

    Route::post('/category-product-create', [CategoryProductController::class, 'create_category_product']) ;
    Route::post('/category-product-update/{id}', [CategoryProductController::class, 'update_category_product']) ;
    //Admin Brand product
    Route::get('/add-brand-product', [BrandProductController::class, 'add_brand_product']);

    Route::get('/all-brand-product', [BrandProductController::class, 'all_brand_product']) ;
    Route::get('unactive-brand-product/{id}', [BrandProductController::class, 'unactive_brand_product']) ;
    Route::get('active-brand-product/{id}', [BrandProductController::class, 'active_brand_product']) ;
    Route::get('edit-brand-product/{id}', [BrandProductController::class, 'edit_brand_product']) ;
    Route::get('delete-brand-product/{id}', [BrandProductController::class, 'delete_brand_product']) ;

    Route::post('/brand-product-create', [BrandProductController::class, 'create_brand_product']) ;
    Route::post('/brand-product-update/{id}', [BrandProductController::class, 'update_brand_product']) ;

    //Admin Product
    Route::get('/add-product', [ProductController::class, 'add_product']);
    Route::get('/all-product', [ProductController::class, 'all_product']) ;
    Route::get('unactive-product/{id}', [ProductController::class, 'unactive_product']) ;
    Route::get('active-product/{id}', [ProductController::class, 'active_product']) ;
    Route::get('edit-product/{id}', [ProductController::class, 'edit_product']) ;
    Route::get('delete-product/{id}', [ProductController::class, 'delete_product']) ;

    Route::post('/product-create', [ProductController::class, 'create_product']) ;
    Route::post('/product-update/{id}', [ProductController::class, 'update_product']) ;
    // Banner
    Route::get('/manager-banner', [BannerController::class, 'manager_banner']) ;
    Route::post('/add-banner', [BannerController::class, 'add_banner']);
    Route::get('/create-banner', [BannerController::class, 'create_banner']);
    Route::get('/active-slide/{id}', [BannerController::class, 'active_slide']);
    Route::get('/unactive-slide/{id}', [BannerController::class, 'unactive_slide']);
    Route::get('/delete-slide/{id}', [BannerController::class, 'delete_slide']);
    Route::get('/update-banner/{id}', [BannerController::class, 'update_banner']);
    Route::get('/edit-banner/{id}', [BannerController::class, 'edit_slide']);
    
    // Inport & Export
    Route::post('export-csv', [CategoryProductController::class, 'export_csv']) ;
    Route::post('import-csv', [CategoryProductController::class, 'import_csv']) ;

    Route::post('import-csv-product', [ProductController::class, 'import_csv_product']) ;
    Route::post('export-csv-product', [ProductController::class, 'export_csv_product']) ;

    Route::post('import-csv-brand', [BrandProductController::class, 'import_csv_brand']) ;
    Route::post('export-csv-brand', [BrandProductController::class, 'export_csv_brand']) ;
    // Mã giảm giá
    Route::post('/check-coupon', [CartController::class, 'check_coupon']); 
    Route::get('/delete-coupon', [CartController::class, 'delete_coupon']); 
    Route::post('/insert-coupon-code', [CouponController::class, 'insert_coupon_code']); 
    Route::get('/insert-coupon', [CouponController::class, 'insert_coupon']); 
    Route::get('/list-coupon', [CouponController::class, 'list_coupon']); 
    Route::get('/delete-coupon/{id}', [CouponController::class, 'delete_coupon']); 
    // Vận chuyển
    Route::get('/delivery', [DeliveryController::class, 'delivery']); 
    Route::get('/select-delivery', [DeliveryController::class, 'select_delivery']); 
    Route::get('/insert-delivery', [DeliveryController::class, 'insert_delivery']); 
    Route::get('/select-feeship', [DeliveryController::class, 'select_feeship']); 
    Route::get('/update-delivery', [DeliveryController::class, 'update_delivery']); 
});

Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout-admin', [AdminController::class, 'logout']) ;


// Tiny
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


// Giỏ hàng
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::get('/add-cart-ajax', [CartController::class, 'add_cart_ajax'])->name('add.ajax'); 
Route::get('/delete-cart/{sessionId}', [CartController::class, 'delete_cart']) -> name('delete-cart');
Route::post('update/cart', [CartController::class, 'update_cart']) -> name('update-cart');
Route::get('/show-cart', [CartController::class, 'show_cart'])-> name('show.cart');
Route::get('/select-delivery-home', [CartController::class, 'select_delivery_home']); 
Route::get('/calculate-fee', [CartController::class, 'calculate_fee']); 

// Check Out
Route::get('/login-checkout',[CheckoutController::class, 'login_checkout']) -> name('login_checkout') ->middleware('auth');
Route::post('save-order-customer',[CheckoutController::class, 'save_order_customer']) ;
Route::get('/payment', [CheckoutController::class, 'payment']);
// Route::get('/manager-order', [CheckoutController::class, 'manager_order']);

Route::get('/confim-order', [CheckoutController::class, 'confim_order']);



//Login facebook
Route::get('/login-facebook',[UserController::class , 'login_facebook']) -> name('login_facebook');
Route::get('/admin/callback',[UserController::class ,'callback_facebook']) ;
//Login Google
Route::get('/login-google',[UserController::class , 'login_google'])-> name('login_google');
Route::get('/google/callback',[UserController::class , 'callback_google']) ;
// Logout
Route::get('/logout-user',[UserController::class , 'logout_user']) -> name('logout_user');



// Order 
Route::get('/manager-order', [OrderController::class, 'manager_order']);
Route::get('/edit-order/{order_code}', [OrderController::class, 'edit_order']);
Route::get('/update-order-status', [OrderController::class, 'update_order_status']);
Route::get('/update-order-number', [OrderController::class, 'update_order_number']);
// In đơn hàng
Route::get('/print-order/{checkout_code}', [OrderController::class, 'print_order']);


// Authentication Roles
// Route::get('/register-auth', [AuthController::class, 'register_auth']);
// Route::get('/login-auth', [AuthController::class, 'login_auth']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login-authenticator', [AuthController::class, 'login_authenticator']);
Route::middleware(['roles.admin'])->group(function () {
    Route::get('/all-users', [AdminUserController::class, 'index']);
    Route::get('/store-users', [AdminUserController::class, 'store_users']);
    Route::post('/assign-roles', [AdminUserController::class, 'assign_roles']);
    Route::post('/add-user', [AdminUserController::class, 'add_user']);
    Route::get('/delete-user-roles/{id}', [AdminUserController::class, 'delete_user_roles']);

});
