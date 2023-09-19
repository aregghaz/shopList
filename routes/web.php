<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\StatisticController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index'])->name('home');


/* Auth */
Route::get('/sign', [UserController::class, 'sign'])->name('sign');
Route::post('/signUp', [UserController::class, "signUp"]);
Route::post('/signIn', [UserController::class, "signIn"]);
Route::get('/logout', [UserController::class, "logout"]);


Route::get('/companies/{name}', [HomeController::class, 'companyByName'])->name('companyByName');
Route::post('/add-review', [UserController::class, 'addReview'])->name('addReview');
Route::get('lang/{lang}', [ LanguageController::class,'switchLang'])->name('lang.switch');
Route::get('productByTag/{teg}', [ProductController::class, 'productByTeg']);
Route::get('all-product', [ProductController::class, 'allProduct'])->name('allProduct');





Route::get('/saveStatistic', ['uses' => [StatisticController::class, "saveStatistic"]])->name('saveStatistic');


Route::get('/category', [HomeController::class, 'category'])->name('category');
Route::get('/404', function () {
    return view('404');
});
Route::get('/all-companies', function () {
    return view('shop.companies');
});
Route::get('/create-your-shop', function () {
    return view('shop.createYourShop');
});


Route::get('/about', [UserController::class, 'about'])->name('about');
Route::any('/contact', [UserController::class,'contact'])->name('contact');

Route::get('/email-verification', [UserController::class, 'verification'])->name('verification');
Route::get('/addFiltre', [FilterController::class, 'addFiltre'])->name('addFiltre');

Route::any('/searchProduct', [UserController::class,'searchProduct'])->name('searchProduct');
Route::get('/shop', function () {
    return view('shop.shop');
});
Route::get('/product-details/{id}', [ProductController::class, 'productDetails'])->where('id', '[0-9]+');
Route::get('/resend-email', ['uses' => "UserController@resendEmail", 'as' => 'resendEmail'])->where('id', '[0-9]+');
Route::any('/reset-password', ['uses' => "UserController@resetPassword", 'as' => 'resetPassword']);
Route::any('/restore-password', ['uses' => "UserController@restorePassword", 'as' => 'restorePassword']);
Route::get('/forgot-password', function () {
    return view('user.forgotPassword', ['noIndex' => true, 'newUser' => false, 'blockUser' => false, 'changePassword' => false]);
});

/*wishList*/
Route::get('/add-to-favorite', [CartController::class, "addWish"]);
Route::get('wishList', [CartController::class,"getWish"]);


Route::get('/deleteWish/{id}', ['uses' => "CartController@deleteWish", 'as' => 'deleteWish'])->where('id', '[0-9]+');

Route::get('/redirect', 'UserController@redirectToProvider');
Route::get('/callback', 'UserController@handleProviderCallback');
Route::get('auth/facebook', 'UserController@redirectToFacebook');
Route::get('auth/facebook/callback', 'UserController@handleFacebookCallback');
Route::group(['middleware' => 'auth'], function () {


    Route::get('/contacts', [ChatsController::class,'get']);
    Route::get('/conversation/{id}', [ChatsController::class,'getMessagesFor'])->where('id', '[0-9]+');
    Route::post('/conversation/send', [ChatsController::class,'send']);



    Route::get('/add-to-cart', [CartController::class,'getAddToCart']);
    Route::get('/shopping-cart', [CartController::class,"getCart"]);

    Route::get('/check-out-all/{id}', ['as' => 'getCheckOutAll', 'uses' => 'CartController@getCheckOutAll']);
    Route::get('/AddToOrder', [CartController::class,'AddToOrder'])->name('AddToOrder');
    Route::get('/deleteCheckoutProdcut/{id}', ['uses' => "CartController@deleteCheckoutProdcut", 'as' => 'deleteCheckoutProdcut'])->where('id', '[0-9]+');
//    Route::get('/logout', [UserController::class,"logout"]);
    Route::any('/updateuser', "UserController@updateuser");




    Route::post('/addOrder', [OrderController::class, "add",])->name('addOrder');
    Route::post('/check-out', [CartController::class, 'getCheckOut'])->name('getCheckOut');




    Route::get('/my-account', [UserController::class ,  'account']);
    Route::get('/cart', function () {
        return view('shop.cart');
    });


    Route::get('/order-details', [OrderController::class, "orderDetails"])->name('orderDetails');
    Route::get('/order-history', [OrderController::class, "orderHistory"])->name('orderHistory');




    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

        /* product*/
        Route::get('/products', [ProductController::class, "index"])->name('products');
        Route::post('/products/edit_product', [ProductController::class,"edit_product"]);
        Route::get('/new-product', [ProductController::class, "newProduct"]);
        Route::post('/products/add_product', [ProductController::class, "add_product"]);
        Route::get('/products/brand/{id}', [ProductController::class,"brand"]);



        Route::get('/users', [AdminController::class, "getUsers"]);
        Route::get('/conversation', [AdminController::class,"conversation"]);
        Route::get('/profile', [AdminController::class, "profile"])->name('profile');
        Route::get('/dashboard', [AdminController::class, "home"])->name('adminHome');
        Route::get('/adminOrders', [AdminController::class, "adminOrders"])->name('adminOrders');
        Route::get('/changeStatus', ['uses' => "Admin\AdminController@changeStatus", 'as' => 'changeStatus']);
        Route::post('/admin_edit_user', [UserController::class,"admin_edit_user"]);
        Route::post('/updateUserFromAdmin', "Admin\AdminController@updateUserFromAdmin");
        Route::post('/updateUserFromAdminLogo', "Admin\AdminController@updateUserFromAdminLogo");
        Route::post('/updateUserFromAdminSlider', "Admin\AdminController@updateUserFromAdminSlider");
        Route::post('/updatePasswordFromAdmin', "Admin\AdminController@updatePasswordFromAdmin");
        Route::get('/deluser/{id}', "UserController@deluser");
        Route::get('/categories', [CategoriesController::class, "index"])->name('adminCategory');
        Route::get('/info', [ClientController::class , "info"])->name('adminInfo');
        Route::post('/addCompany', ['uses' => "Client\ClientController@addCompany", 'as' => 'addCompany']);
        Route::post('/add_category', [CategoriesController::class, "add_category"]);
        Route::post('/edit_category', [CategoriesController::class, "edit_category"]);
        Route::get('/del_category/{id}', "Admin\CategoriesController@del_category");
        Route::post('/subcategory', "Admin\CategoriesController@add_sub_category");
        Route::post('/sub_edit_category', "Admin\CategoriesController@sub_edit_category");
        Route::get('/sub_del_category/{id}', [CategoriesController::class, "sub_del_category"]);

        Route::get('/products/getsubcajax', [ProductController::class,"getsubcategoryajax"]);


        Route::get('/products/del_product/{id}', "Admin\ProductController@del_product");

        Route::get('/products/featured/{id}', "Admin\ProductController@featured");
        Route::get('/products/sale/{id}', "Admin\ProductController@sale");
        Route::get('/products/best/{id}', "Admin\ProductController@best");


        Route::get('/brands', [ProductController::class, "get_brands"]);
        Route::get('/featureds', [ProductController::class ,"get_featured"]);
        Route::get('/sales', [ProductController::class, "get_sales"]);
        Route::get('/bests', [ProductController::class, "get_bests"]);

        Route::get('/del_brand/{id}', "Admin\ProductController@del_brand");
        Route::get('/del_featured/{id}', "Admin\ProductController@del_featured");

        Route::get('/del_sales/{id}', "Admin\ProductController@del_sales");
        Route::get('/del_bests/{id}', "Admin\ProductController@del_bests");

        Route::get('/notification', [AdminController::class, "notification"])->name('notification');

    });
});

Route::get('/termsAndConditions', function () {
    return view('shop.terms', ['noIndex' => true]);
});

Route::get('/privacy-policy', function () {
    return view('shop.privacy', ['noIndex' => true]);
});

Route::get('messages', [ChatsController::class,'fetchMessages']);
Route::post('messages', [ChatsController::class,'sendMessage']);
