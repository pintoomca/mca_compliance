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

// Route::get('/', function () {
//     return view('welcome');
// });
//Users
Route::get('/register', 'AuthController@register');
Route::post('/registerSubmit', 'AuthController@registerSubmit');
Route::get('/login', 'AuthController@login');
Route::post('/loginSubmit', 'AuthController@loginSubmit');

Route::get('/user/list', 'UserController@list');
Route::get('/user/add', 'UserController@add');
Route::post('/user/addSubmit', 'UserController@addSubmit');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::post('/user/editSubmit/{id}', 'UserController@editSubmit');
Route::get('/user/view/{id}', 'UserController@view');
Route::get('/user/change-status/{id}', 'UserController@changeStatus');
Route::get('/user/delete/{id}', 'UserController@delete');
Route::get('/user/login_as/{id}', 'UserController@loginAs');
// Password reset routes...

Route::get('recover', 'AuthController@recover');
Route::post('/recoverSubmit', 'AuthController@recoverSubmit');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('password/resetPassword', 'Auth\ResetPasswordController@resetPassword')->name('password.reset');
Route::group(['middleware' => ['jwt.auth']], function() {

    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });
    Route::get('companycsrs', 'API\CompanyCsrController@index');
});
Route::get('logout', 'AuthController@logout');
Route::get('/', 'HomeController@index');
Route::get('/home2', 'HomeController@index2');
Route::get('/home3', 'HomeController@index3');
Route::get('/home4', 'HomeController@index4');
Route::get('/home5', 'HomeController@index5');
//Dashboard
Route::get('/dashboard', 'DashboardController@index');
//Notice
Route::get('notice/list', 'NoticeController@index');
Route::get('notice_roc/list', 'NoticeRocController@index');
Route::get('provision_wise_notice/list', 'ProvisionWiseNoticeController@index');
Route::get('provision_wise_company/list', 'ProvisionWiseCompanyController@index');
Route::get('inspector_wise_notice/list', 'NoticeInspectorController@index');
Route::get('compliance_company/view', 'ComplianceCompanyController@index');
Route::get('compliance_mail/view', 'ComplianceCompanyController@mailView');
Route::get('company/list', 'CompanyController@index');
Route::get('company/view', 'CompanyController@view');
