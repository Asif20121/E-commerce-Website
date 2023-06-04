<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ReportController;

use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\ShippingAreaController;


use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\Frontend\ProductPageController;
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

// aaaaaa


// Route::get('/', function () {
//     return view('welcome');
// });

// Admin Login Routes Start
Route::middleware('admin:admin')->group(function () {
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});
// Admin Login Routes End


// Admin Section All Routes Start
Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified' ])->group(function () {
    // Route::get('/admin/dashboard', function () {
    //     return view('admin.index');
    // })->name('dashboard')->middleware('auth:admin');
    
    Route::get('/admin/dashboard', [DashboardController::class, 'AdminDashboard'])->name('dashboard')->middleware('auth:admin');



    // Admin Logout Routes Start 
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    // Admin Logout Routes End 


    // Admin Profile All Route Start
    Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');

    // Admin Profile All Route End


    // Admin Brand All Route Start
    Route::prefix('brand')->group(function() {
        Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
        Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
        Route::post('/update/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
    });
    // Admin Brand All Route End


    // Admin Category All Route Start
    Route::prefix('category')->group(function() {
        Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
        Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

        // Admin Sub Category All Route Start
        Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
        Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
        Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
        Route::post('/sub/update/{id}', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
        Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
        // Admin Sub Category All Route End

        // Admin Sub->Sub Category All Route Start
        Route::get('/sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
        Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
        Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
        Route::post('/sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
        Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
        Route::post('/sub/sub/update/{id}', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
        Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
        // Admin Sub->Sub Category All Route End
    });
    // Admin Category All Route End


    // Admin Products All Route Start
    Route::prefix('product')->group(function() {
        Route::get('/details/view/{id}', [ProductController::class, 'DetailsViewProduct'])->name('details-view-product');
        Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');
        Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');
        Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
        Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'ProductDataUpdate'])->name('product-update');
        Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
        Route::post('/thambnail/update/{id}', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
        Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
        Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
        Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
        Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
    });
    // Admin Products All Route End


    // Admin Slider All Route Start
    Route::prefix('slider')->group(function() {
        Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');
        Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
        Route::post('/update/{id}', [SliderController::class, 'SliderUpdate'])->name('slider.update');
        Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
        Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
        Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');

    });
    // Admin Brand All Route End 


    // Admin Slider All Route Start
    Route::prefix('coupons')->group(function() {
        Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');
        Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
        Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
        Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
        Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
    });
    // Admin Brand All Route End 


    // Admin Shipping All Route Start
    Route::prefix('shipping')->group(function() {
        // Ship Division All Route Start
        Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');
        Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');
        Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');
        Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');
        Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');
        // Ship Division All Route End


        // Ship District All Route Start
        Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage-district');
        Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');
        Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');
        Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');
        Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');
        // Ship District All Route End


        // Ship Upazila All Route Start
        Route::get('/upazila/view', [ShippingAreaController::class, 'UpazilaView'])->name('manage-upazila');
        Route::post('/upazila/store', [ShippingAreaController::class, 'UpazilaStore'])->name('upazila.store');
        Route::get('/upazila/edit/{id}', [ShippingAreaController::class, 'UpazilaEdit'])->name('upazila.edit');
        Route::post('/upazila/update/{id}', [ShippingAreaController::class, 'UpazilaUpdate'])->name('upazila.update');
        Route::get('/upazila/delete/{id}', [ShippingAreaController::class, 'UpazilaDelete'])->name('upazila.delete');
        Route::get('/district-get/ajax/{division_id}', [ShippingAreaController::class, 'DistrictGetAjax']);
        // Ship Upazila All Route End

    });
    // Admin Shipping All Route End


    // Admin Order All Route Start
    Route::prefix('orders')->group(function() {
        Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('prnding-orders');
        Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');
        Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');
        Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');
        Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');
        Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');
        Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');
        Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');

        // Order Status Update
        Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');
        Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');
        Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing.picked');
        Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');
        Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');


        Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');
    });
    // Admin Order All Route End 



    // Admin Reports All Route Start
    Route::prefix('reports')->group(function() {
        Route::get('/view', [ReportController::class, 'ReportView'])->name('all-reports');
        Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');
        Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');
        Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');
        Route::post('/search/by/report', [ReportController::class, 'ReportByReport'])->name('search-by-report');
    });
    // Admin Reports All Route End 



    // Admin Blog All Route Start
    // Route::prefix('blog')->group(function() {
    //     Route::get('/category', [BlogController::class, 'BlogCategory'])->name('blog.category');
    //     Route::post('/store', [BlogController::class, 'BlogCategoryStore'])->name('blogcategory.store');
    //     Route::get('/category/edit/{id}', [BlogController::class, 'BlogCategoryEdit'])->name('blog.category.edit');
    //     Route::post('/update/{id}', [BlogController::class, 'BlogCategoryUpdate'])->name('blogcategory.update');
    //     Route::get('/delete/{id}', [BlogController::class, 'BlogCategoryDelete'])->name('blog.category.delete');

    //     // Admin View Blog All Route Start
    //     Route::get('/list/post', [BlogController::class, 'ListBlogPost'])->name('list.post');
    //     Route::get('/add/post', [BlogController::class, 'AddBlogPost'])->name('add.post');
    //     Route::post('/post/store', [BlogController::class, 'BlogPostStore'])->name('post-store');
    //     // Admin View Blog All Route End
    // });
    // Admin Blog All Route End



    // Admin Site Setting All Route Start
    Route::prefix('setting')->group(function() {
        Route::get('/site', [SiteSettingController::class, 'SiteSetting'])->name('site.setting');
        Route::post('/site/update/{id}', [SiteSettingController::class, 'SiteSettingUpdate'])->name('update.sitesetting');
        // Route::get('/seo', [SiteSettingController::class, 'SeoSetting'])->name('seo.setting');
        // Route::post('/seo/update/{id}', [SiteSettingController::class, 'SeoSettingUpdate'])->name('update.seosetting');
    });
    // Admin Site Setting All Route End



    // Admin Return Order All Route Start
    Route::prefix('return')->group(function() {
        Route::get('/admin/request', [ReturnController::class, 'ReturnRequest'])->name('return.request');
        Route::get('/admin/return/approve/{order_id}', [ReturnController::class, 'ReturnRequestApprove'])->name('return.approve');
        Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all.request');
    });
    // Admin Return Order All Route End


    // Admin Manage Stock All Route Start
    Route::prefix('stock')->group(function() {
        Route::get('/product', [ProductController::class, 'ProductStock'])->name('product.stock');
    });
    // Admin Manage Stock All Route End



    // // Admin Get All User Route Start
    // Route::prefix('alluser')->group(function() {
        // Route::get('/alluser/view', [AdminProfileController::class, 'AllUsers'])->name('all-users');
    // });
    // // Admin Get All User Route End


    
});
// Admin Section All Routes End 


    // // Admin Get All User Route Start
    Route::prefix('alluser')->group(function () {

        Route::get('/view', [AdminProfileController::class, 'AllUsers'])->name('all-users');
    });
    // // Admin Get All User Route End










////////////////////////////////  Frontend Start  /////////////////////////////////////


// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


 ////  User Must Login  ////
Route::group(['prefix' => 'user', 'middleware' => ['web', 'auth'], 'namespace' => 'User'], function () {

    // Frontend Wishlist page All Route Start
    Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');
    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);
    // Frontend Wishlist page All Route End

    // Frontend Roder All Route Start
    Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');
    Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);
    Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);
    Route::post('/return/order/{order_id}', [AllUserController::class, 'ReturnOrder'])->name('return.order');
    Route::get('/return/order/list', [AllUserController::class, 'ReturnOrderList'])->name('return.order.list');
    Route::get('/order/cancel/{order_id}', [AllUserController::class, 'OrdersCancel'])->name('orders.cancel');
    Route::get('/cancel/orders', [AllUserController::class, 'CancelOrders'])->name('cancel.orders');
    // Frontend Roder All Route End

    /// Order Traking Route 
    // Route::post('/order/tracking', [AllUserController::class, 'OrderTraking'])->name('order.tracking');

    // Payments Gateway Stripe Route Start
    // Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
    // Payments Gateway Stripe Route End

});


    // Frontend Coupon All Route Start
    Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
    Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
    Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);
    // Frontend Coupon All Route End


    // Frontend Checkout All Route Start 
    Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
    Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);
    Route::get('/upazila-get/ajax/{district_id}', [CheckoutController::class, 'UpazilaGetAjax']);
    Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');
    // Frontend Checkout All Route End 
    
// aaaa
// aaaa
// aaaa


//logout user
Route::get('logout', [UserController::class, 'destroy'])->name('user.logout');
// ////Main root route////
Route::get('/', [IndexController::class, 'index'])->name('front_index');

// Google login route //
Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});




Route::get('product/brand/{brand_id}', [IndexController::class,'ShowBrandProduct'])->name('product.brand');

Route::get('product/category/{mainCategory_id}', [IndexController::class,'ShowCategoryProduct'])->name('product.category');
Route::get('product/subcategory/{subCategory_id}', [IndexController::class,'ShowSubCategoryProduct'])->name('product.subcategory');
Route::get('product/subsubcategory/{subsubCategory_id}', [IndexController::class,'ShowSubSubCategoryProduct'])->name('product.subsubcategory');

Route::get('product/category/ajax/{mainCategory_id}', [IndexController::class,'ShowCategoryProduct'])->name('ajax.category');

//language session//
Route::get('/language/bangla',[IndexController::class, 'Bangla'])->name('bangla.language');
Route::get('/language/english',[IndexController::class, 'English'])->name('english.language');
//signin//
Route::post('/loginOrSignup', [UserController::class, 'loginOrSignup'])->name('loginOrSignup');
Route::get('/login', [UserController::class, 'login'])->name('login');

//front Product Detail Page URL 
Route::get('product/details/{id}',[IndexController::class, 'ProductDetail']);

// Product View Modal with Ajax
Route::get('/productone/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
Route::POST('/productone/direct/cart', [CartController::class, 'ProductDirectAdd'])->name('direct.cart');

// Add to Cart Store Data
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

// Get Data from mini cart
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

// Remove mini cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// Add to Wishlist
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);



// My Cart Page All Routes
Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);

Route::get('/user/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);

Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);

Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);


Route::get('/category/{mainCategory_id}/{mainCategory_name}', [ProductPageController::class, 'ShowProductCategoryPage'])->name('productPage.category');
Route::get('/sub_category/{subCategory_id}/{subCategory_name}', [ProductPageController::class, 'ShowProductSubCategoryPage'])->name('productPage.subcategory');
Route::get('/sub_sub_category/{subSubCategory_id}/{subSubCategory_name}', [ProductPageController::class, 'ShowProductSubSubCategoryPage'])->name('productPage.subsubcategory');

Route::get('/slider/front/show', [IndexController::class, 'ShowSlider']);

Route::get('/profile', [UserController::class, 'ShowProfilePage'])->name('user.profile');
Route::get('/pass/change', [UserController::class, 'ShowChangePass'])->name('user.password');
Route::post('/profile/update/{user_id}', [UserController::class, 'UpdateProfile'])->name('user.profile.update');
Route::post('/user/change/password', [UserController::class, 'UserChangePassword'])->name('change.password');

Route::get('/special_product', [ProductPageController::class, 'ShowSpecialPage'])->name('productPage.special');
Route::get('/special_deal', [ProductPageController::class, 'ShowSpecialDealPage'])->name('productPage.special.deal');
Route::get('/featured', [ProductPageController::class, 'ShowFeaturedPage'])->name('productPage.featured');
Route::get('/hot_deal', [ProductPageController::class, 'ShowHotDealPage'])->name('productPage.hotdeal');
Route::get('/All_Brand', [ProductPageController::class, 'ShowAllBrandPage'])->name('productPage.brand');
Route::get('/Brand_product/{brand_id}', [ProductPageController::class, 'ShowSingleBrandPage'])->name('productPage.single.brand');
Route::get('/get/product-name/', [ProductPageController::class, 'get_product_name']);


Route::get('/dashboard', function () {
    return redirect('/');
});

//test


// Route::get('/storage', function () {
//     // Artisan::call('storage:link');
//     $target = '/home/airticketbanglad/public_html/fmshop/storage';
//     $link = '/home/airticketbanglad/public_html/fmshop/fmshop_app/storage/app/public';
//     echo symlink($link, $target);
//     // echo readlink($link);
// });
