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

// ********************************************************************** //

Route::get('/', function () {
    return view('homePage');
})->name('home');

// ********************************************************************** //

Route::get('/admin/index', 'ProjectController@index')->name('admin-index');
// ********************************************************************** //
Route::resource('user', UsersController::class);
Route::post('/update/{id}', 'UsersController@updateProfile')->name('update-profile');

// ********************************************************************** //
Route::get('/inscription', 'Auth\AuthController@register')->name('sign-up');
Route::post('/inscription', 'Auth\AuthController@storeUser');

Route::get('/login', 'Auth\AuthController@login')->name('login');
Route::post('/login', 'Auth\AuthController@authenticate');

Route::get('logout', 'Auth\AuthController@logout')->name('logout');
// ********************************************************************** //


// *********************************************************************** //
Route::get('/{id}/Dépot_dossier', 'ProjectController@filesUploadView')->name('uploadF');
Route::post('/{id}/Dépot_dossier', 'ProjectController@addProject');
Route::post('/update-project', 'ProjectController@updateProject')->name('dossier.update');
Route::get('/remove-file/{id}', 'ProjectController@removeFile')->name('remove-file');
Route::get('/edit-project/{id}', 'ProjectController@editProject')->name('edit.dossier');

Route::get('/download-zip/{fileName}', 'ProjectController@downloadZip')->name('download.zip');

// ************************************************************************ //

Route::get('/validate/{id}/{proTitle}', 'ProjectController@addToValidationQueueView')->name('sendProjectToADMIN');
Route::post('/validate', 'ProjectController@addToValidationQueue')->name('project.validate');

// *********************************************************************** //

Route::post('/video-call','ExpertController@videoCallPost')->name('videocallpost');
Route::get('/video-call/{email}/{room}','ExpertController@videoCall')->name('videocall');
Route::get('/Consultation_en_ligne','ExpertController@index')->name('expertChat');


Route::get('/messages', 'MessageController@index')->name('messages.index');
Route::get('/messages/{ids}', 'MessageController@chat')->name('messages.chat');



// *********************************************************************** //

Route::get('checkout/{operation}','CheckoutController@checkout')->name('checkout');
Route::post('checkout','CheckoutController@afterpayment')->name('checkout.credit-card');


Route::get('/Consulter_un_investisseur', function (){
    return view('investor');
})->name('investor');

Route::get('/Nos_service', function (){
    return view('our-service');
})->name('services');

Route::get('/Eligibilité', function (){
    return view('websiteElig');
})->name('elig');

Route::get('/Qui_somme_nous', function (){
    return view('about-us');
})->name('about-us');

Route::get('/Nos_contacter', function (){
    return view('contact');
})->name('contact');