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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/addemployee', 'EmployeeController@create')->name('addemployee');
Route::post('/saveemployee', 'EmployeeController@store')->name('saveemployee');
Route::get('/employeelist', 'EmployeeController@index')->name('employeelist');
Route::post('/updateemploye', 'EmployeeController@update')->name('updateemploye');
Route::get('/edit_employee/{id}', 'EmployeeController@edit')->name('edit_employee');
Route::get('/projectlist', 'ProjectController@index')->name('projectlist');
Route::get('/addproject', 'ProjectController@create')->name('addproject');
Route::post('/saveproject', 'ProjectController@store')->name('saveproject');
Route::get('/edit_project/{id}', 'ProjectController@edit')->name('edit_project');
Route::get('/delete_project/{id}', 'ProjectController@destroy')->name('delete_project');
Route::post('/updateproject', 'ProjectController@update')->name('updateproject');
Route::get('/tasklist', 'TaskController@index')->name('tasklist');
Route::get('/addtask', 'TaskController@create')->name('addtask');
Route::post('/savetask', 'TaskController@store')->name('savetask');
Route::get('/edit_task/{id}', 'TaskController@edit')->name('edit_task');
Route::get('/delete_task/{id}', 'TaskController@destroy')->name('delete_task');
Route::post('/updatetask', 'TaskController@update')->name('updatetask');