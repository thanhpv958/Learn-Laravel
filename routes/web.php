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

// view
Route::get('view1/{t}', 'MyController@view1' );

// view share
View::share('keyShare', 'valueShare');

// blade template
Route::get('bladeMaster', function() {
    return view('page.laravel');
});

// create table database by route
Route::get('createLoaiSP', function() {
    Schema::create('loaisanpham', function($table) {
        $table->increments('id');
        $table->string('tensp');
    });

    echo 'Ok';
});

// model
Route::get('model/sanpham/save/{t}/{g}',function($t, $g) {
    $sanpham = new App\SanPham();
    $sanpham->ten = $t;
    $sanpham->gia = $g;
    $sanpham->save();

    echo 'Đã save()';
});

Route::get('model/sanpham/all', function() {
    $sanpham = App\SanPham::all()->toJson();
    echo '<pre>';
    var_dump($sanpham);
    echo '</pre>';

});

Route::get('model/sanpham/ten', function() {
    $sanpham = App\SanPham::all()->toArray();
    foreach ($sanpham as $value) {
        echo '<pre>';
        var_dump($value['ten']);
        echo '</pre>';
    }
});

Route::get('model/sanpham/delete', function() {
    $sanpham =  App\SanPham::find(1);
    $sanpham->delete();
});


// Middleware
Route::get('diem', function() {
    echo 'diem';
})->middleware('Mymiddle');

Route::get('loiDiem', function() {
    echo 'loi diem';
})->name('loiDiem');


// Auth
Route::get('dangnhap', function() {
    return view('login.dangnhap');
});

Route::post('login', 'AuthController@dangnhap')->name('dangnhap');

Route::get('logout', 'AuthController@logout');

Route::get('thanhcong', function() {
    return view('login.thanhcong');
});

// Relationship
Route::get('getRSanPham', function() {
    $data = App\SanPham::find(1)->loaiSanPham->toArray();
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
});

Route::get('getRLoaiSanPham', function() {
    $data = App\LoaiSanPham::find(1)->sanpham->toArray();
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
});