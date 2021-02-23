<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//管理用パス
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('admin-register');

Route::view('/admin', 'admin')->middleware('auth:admin')->name('admin-home');

//パスワードリセット用
Route::get('password/admin/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('password/admin/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('password/admin/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('password/admin/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');


//認証していない場合遷移不可

Route::group(['middleware' => ['auth']], function() {
//トップページ
Route::get('toppage','TopPageController@index')->name('toppage');

//マイページ
Route::get('mypage/{user_name}','MyPageController@show')->name('mypage');

//投稿ページ
Route::get('submit','SubmitController@index')->name('submit');
Route::post('store','SubmitController@store')->name('store');

//詳細ページ
Route::get('detail/{id}', 'DetailController@show')->name('detail');

//コメントページ
Route::post('comment', 'CommentController@store')->name('comment');

});