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
	// return view('welcome');

	$links = \App\Link::all();

	return view('welcome', ['links' => $links]);
	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/department', 'DepartmentController@index')->name('department');
Route::post('/department', 'DepartmentController@create')->name('department');

Route::get('/position', 'PositionController@index')->name('position');
Route::post('/position', 'PositionController@store')->name('position');

Route::get('/employee', 'EmployeeController@index')->name('employee');
Route::post('/employee', 'EmployeeController@store')->name('employee');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile', 'ProfileController@store')->name('profile');
Route::get('/profile/{id}', 'ProfileController@show');

Route::post('file-import', 'EmployeeController@fileImport')->name('file-import');
Route::get('file-export', 'EmployeeController@fileExport')->name('file-export');

Route::post('file-import/position', 'PositionController@fileImport')->name('positionfile-import');
Route::get('file-export/excel', 'PositionController@excelExport')->name('positionexcel-export');
Route::get('file-export/csv', 'PositionController@csvExport')->name('positioncsv-export');

Route::get('/employee/pdf','EmployeeController@createPDF');
Route::get('/employee/pdf/position','PositionController@createPDF');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
