<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

     Route::post('login', 'Auth\AuthController@login');
     Route::post('register', 'Auth\AuthController@register');

     // Lesson
     Route::get('lessons', 'ClassroomController@allLessons');

     //Subject
     Route::get('subjects', 'ClassroomController@allSubjects');

     //Class List
     Route::get('lists', 'AttendanceController@list');

     // Attendance List
     Route::get('attendance', 'AttendanceController@attendance');

     //Students Routes
     Route::get('students', 'StudentController@index');
     Route::get('students/{id}', 'StudentController@show');


     //Teachers Routes
     Route::get('teachers', 'TeacherController@index');
     Route::get('teachers/{id}', 'TeacherController@show');

     Route::group([
        'middleware' => 'auth:api'
      ], function() {
            Route::get('logout', 'Auth\AuthController@logout');
            Route::get('user', 'Auth\AuthController@user');

                //Teacher
                Route::post('teachers', 'TeacherController@store');
                Route::put('teachers/{id}', 'TeacherController@update');
                Route::delete('teachers/{id}', 'TeacherController@destroy');

                //Student
                Route::post('students', 'StudentController@store');
                Route::put('students/{id}', 'StudentController@update');
                Route::delete('students/{id}', 'StudentController@destroy');

                //Class List
                Route::post('lists', 'AttendanceController@listCreated');
                Route::post('attendance', 'AttendanceController@attendanceList');

                //ClassRoom
                Route::post('lessons', 'ClassroomController@createLesson');
                Route::post('subjects', 'ClassroomController@createSubject');

   });




