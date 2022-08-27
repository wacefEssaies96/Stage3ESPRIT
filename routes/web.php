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

// ******************************** HOME PAGE ************************************** //

Route::get('/', function () {
    return view('homePage');
})->name('home');

// ********************************************************************** //

// ******************************** CRUD USER ************************************** //
Route::post('/user/search', 'UsersController@searchByName')->name('user.search');
Route::post('/user/search', 'UsersController@searchForAdmin')->name('user.search.admin');
Route::resource('user', UsersController::class);
Route::put('/update/{id}', 'UsersController@updateProfile')->name('update-profile');

// ********************************* AUTHENTICATION ************************************* //
Route::get('/inscription', 'Auth\AuthController@register')->name('sign-up');
Route::post('/inscription', 'Auth\AuthController@storeUser');

Route::get('/login', 'Auth\AuthController@login')->name('login');
Route::post('/login', 'Auth\AuthController@authenticate');

Route::get('logout', 'Auth\AuthController@logout')->name('logout');


// ******************************** DEPOT DES DOSSIER *************************************** //
Route::get('/{id}/Dépot_dossier', 'ProjectController@filesUploadView')->name('uploadF');
Route::post('/{id}/Dépot_dossier', 'ProjectController@addProject');
Route::post('/update-project', 'ProjectController@updateProject')->name('dossier.update');
Route::get('/remove-file/{id}', 'ProjectController@removeFile')->name('remove-file');
Route::get('/edit-project/{id}', 'ProjectController@editProject')->name('edit.dossier');

Route::get('/download-zip/{fileName}', 'ProjectController@downloadZip')->name('download.zip');

// ********************************* VALIDATE PROJECT *************************************** //

Route::get('/validate/{id}/{proTitle}', 'ProjectController@addToValidationQueueView')->name('sendProjectToADMIN');
Route::post('/validate', 'ProjectController@addToValidationQueue')->name('project.validate');

// *********************************VIDEO CHAT CONFERENCE************************************** //

Route::post('/video-call', 'VideoChatConferenceController@videoCallPost')->name('videocallpost');
Route::get('/video-call/{email}/{room}', 'VideoChatConferenceController@videoCall')->name('videocall');

// ******************************** PAIEMENT *************************************** //

Route::get('checkout/{operation}', 'CheckoutController@checkout')->name('checkout');
Route::post('checkout', 'CheckoutController@afterpayment')->name('checkout.credit-card');

// ******************************** CONTACT *************************************** //
Route::post('/contact/search', 'ContactController@search')->name('contact.search');
Route::resource('contact', ContactController::class, ['only' => ['create', 'store', 'index', 'destroy', 'show']]);


Route::get('/investisseur', 'UsersController@investors')->name('investor');
Route::get('/consultation-en-ligne', 'UsersController@experts')->name('expertChat');


Route::get('/admin/index', 'ProjectController@index')->name('admin.index');
Route::post('/projects/search', 'ProjectController@search')->name('project.search');

Route::get('/nos-service', function () {
    return view('our-service');
})->name('services');

Route::get('/eligibilite', function () {
    return view('websiteElig');
})->name('elig');

Route::get('/qui-somme-nous', function () {
    return view('about-us');
})->name('about-us');
Route::get('/projects', function () {
    return view('projects');
})->name('projects');
