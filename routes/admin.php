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
define('PAGINATION',5);

Route::group(['prefix' => 'admin' , 'namespace' => 'Doctors'] , function (){
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    
    //=====================================Start Doctor Routes===========================================
    Route::get('/create-doctor','DoctorController@create_doctor')->name('create.doctor');
    Route::post('/create-doctor','DoctorController@store_doctor')->name('store.doctor');
    Route::get('/show-doctors','DoctorController@show_doctors')->name('show.all');
    Route::get('/edit-doctor/{id}','DoctorController@edit_doctor')->name('edit.doctor');
    Route::post('/update-doctor/{id}','DoctorController@update_doctor')->name('update.doctor');
    Route::post('/delete-doctor/{id}','DoctorController@delete_doctor')->name('delete.doctor');
    //=====================================End Doctor Routes===========================================

     //=====================================Start Patients Routes===========================================

    //=======================================End Patients Routes===========================================

});





// Route::get('/create-doctor',function (){
//     return view('doctors.create_doctor');
// })->name('create.doctor');

// Route::get('/show-all-doctors',function (){
//     return view('doctors.show_doctors');
// })->name('show.all');