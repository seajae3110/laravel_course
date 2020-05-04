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
    return redirect()->route('students.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/students', 'StudentController@index')->name('students.index');
Route::get('/students/add', 'StudentController@addStudent')->name('students.add');
Route::post('/students/store', 'StudentController@store')->name('students.store');
Route::post('/students/update', 'StudentController@updateStaff')->name('students.update');
Route::post('/students/destroy', 'StudentController@destroyStaff')->name('students.delete');


Route::get('/students/check-attendance', 'StudentController@checkAttendance')->name('students.check_attendance');
Route::post('/students/{id}/attendance-present', 'StudentController@attendancePresent')->name('students.attendance-present');
Route::post('/students/{id}/attendance-absent', 'StudentController@attendanceAbsent')->name('students.attendance-absent');
Route::get('/students/attendance-report', 'StudentController@attendanceReport')->name('students.attendance_report');
Route::get('/students/staffs','StudentController@staff')->name('students.staffs');


Route::get('/students/patients','PatientsController@patient')->name('students.patients');
Route::post('/students/storePatient', 'PatientsController@storePatient')->name('patients.storePatient');
Route::post('/students/updatePatient', 'PatientsController@updatePatient')->name('students.updatePatient');
Route::post('/students/destroyPatient', 'PatientsController@destroyPatient')->name('students.destroyPatient');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
