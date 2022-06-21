<?php

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

Route::get('/download/{patch}/{file}', 'DownloadController@download');

Route::get('/', 'HomeController@index');
Route::get('/search', 'HomeController@searchform');
Route::get('/law', 'HomeController@law');
Route::get('/contact', 'HomeController@contact');
Route::get('/single/{id}', 'HomeController@single');
Route::post('/sans/ticket', 'HomeController@ticket');
Route::get('/sans/{id}', 'HomeController@sansModal');
Route::get('/home/chair/{plan}/{sans}', 'HomeController@chair');
Route::any('/ticket/pay', 'HomeController@pay');
Route::get('/ticket/code/{code}', 'HomeController@code');
Route::any('/chairDelete/{id}', 'HomeController@deleteChair');
Route::post('/ticket/code', 'HomeController@search');

Route::get('/discount/{code}/{sans}/{count}', 'HomeController@discount');
# Payment
Route::get('payment/checkout/{token}', 'PaymentController@checkout');
Route::post('payment/checkout/{token}', 'PaymentController@checkout');
Route::get('payment/bank-redirect/{bank}', 'PaymentController@bankRedirect');



Route::group(['prefix' => 'panel', 'namespace' => 'Panel', 'middleware' => ['auth']], function () {

    Route::get('/index', 'PanelController@index');
    Route::get('/scan', 'PanelController@scan');
    Route::get('/scan/{id}', 'PanelController@scancheck');

    Route::get('/finance', 'FinanceController@salled');
    Route::get('/finance/export', 'FinanceController@export');
    Route::post('/finance/chair/{id}', 'FinanceController@chair');
    Route::get('/finance/sans/{id}', 'FinanceController@sans');

    Route::resource('/slider', 'SliderController');
    Route::any('/slider/changeStatus', 'SliderController@changeStatus');
    Route::any('/slider/sliderDestroy/{id}', 'SliderController@delete');

    Route::resource('/salon', 'SalonController');
    Route::any('/salon/salonDestroy/{id}', 'SalonController@destroy');
    Route::any('/salon/changeStatus', 'SalonController@changeStatus');

    Route::any('/planeDestroy/{id}', 'PlaneController@delete');
    Route::any('/planeEdit/{id}', 'PlaneController@edit');
    Route::any('/planeUpdate/{id}', 'PlaneController@update');
    Route::any('/plane/changeStatus', 'PlaneController@changeStatus');

    Route::resource('/plane/{id}', 'PlaneController', ['only' => ['index', 'create', 'store']]);

    Route::resource('/program', 'ProgramController');
    Route::any('/program/changeStatus', 'ProgramController@changeStatus');
    Route::any('/program/programDestroy/{id}', 'ProgramController@destroy');

    Route::any('/sansDestroy/{id}', 'SansController@destroy');
    Route::any('/sansEdit/{id}', 'SansController@edit');
    Route::any('/sansUpdate/{id}', 'SansController@update');
    Route::any('/sans/changeStatus', 'SansController@changeStatus');
    Route::get('/sans/plans/{id}', 'SansController@plane');
    Route::get('/sans/chair/{id}/{sans}', 'SansController@chair');
    Route::post('/sans/chair/chairUpdate', 'SansController@chairUpdateRow');

    Route::resource('/sans/{id}', 'SansController', ['only' => ['index', 'create', 'store']]);


    Route::any('/discountDestroy/{id}', 'DiscountController@destroy');
    Route::any('/discountEdit/{id}', 'DiscountController@edit');
    Route::any('/discountUpdate/{id}', 'DiscountController@update');
    Route::any('/discount/changeStatus', 'DiscountController@changeStatus');
    Route::resource('/discount/{id}', 'DiscountController', ['only' => ['index', 'create', 'store']]);

    Route::any('/imageDestroy/{id}', 'ImageController@destroy');
    Route::get('/image/{id}/{type}', 'ImageController@index');
    Route::get('/image/create/{id}/{type}', 'ImageController@create');
    Route::post('/imageStore', 'ImageController@store');

    Route::post('/plane/chair/chairUpdate', 'ChairController@chairUpdateRow');

    Route::get('/plane/chair/{id}', 'ChairController@index');
    Route::post('/plane/chair/storeRow', 'ChairController@storeRow');
    Route::any('/plane/chair/deleteRow/{id}', 'ChairController@deleteRow');

# users
    Route::resource('users', 'UserController');;
    Route::any('/users/userDestroy/{id}', 'UserController@destroy');
# End users

# Roles
    Route::resource('roles', 'RoleController');
# End Roles

#image
    Route::any('/deleteImage/{id}', 'PanelController@destroyImage');
#end image

});


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
