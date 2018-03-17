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

// simple route
Route::get('/learn', function() {
    return 'Learn laravel';
});

// redirect route
Route::redirect('learnRedirect', '/learn');


// require parameters
Route::get('learnC/{course}', function($course) {
    echo 'Learn: ' . $course;
});

//option parameters
Route::get('learnD/{dateLearn?}', function($datelearn='0509') {
    return $datelearn;
});

// regular expession

Route::get('learnRE/{id}', function($id) {
    return $id;
})->where(['id' => '[0-9]+']);

// name
// Route::get('learnN', function() {
//     echo 'Xin chao learnN';
// })->name('routeLN');

// Route::get('learnRe', function() {
//     return redirect()->route('routeLN');
// });

Route::get('learnN/{id}', function($id) {
    echo 'Xin chao learnN ' . $id;
})->name('routeLN');

Route::get('learnRe', function() {
    //$url = route('routeLN', ['id' => 1]);
    return redirect()->route('routeLN', ['id' => 1]);
});

//route group
Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        // Matches The "/admin/users" URL
        return 'user admin route';
    });
});

// goi controller
Route::get('testController', 'MyController@testController')->name('testController');
Route::get('testControllerPara/{name}', 'MyController@testControllerPara');
Route::get('testRedirect', 'MyController@testRedirect');

// request
Route::get('getURL', 'MyController@getURL');

Route::get('getForm', function() {
    return view('postForm');
});

Route::post('postForm', 'MyController@postForm')->name('postForm');

// set get cookie

Route::get('setCookie', 'MyController@setCookie');
Route::get('getCookie', 'MyController@getCookie');

// get file
Route::get('uploadFile', function() {
    return view('postFile');
});

Route::post('postFile', 'MyController@postFile')->name('postFile');

//json
Route::get('getJSON', 'MyController@getJSON');