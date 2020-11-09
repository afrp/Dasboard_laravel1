<?php
use App\Book;
use App\Http\Resources\Book as BookResource;

use Illuminate\Http\Request;

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




/**Route::get('/book', function () {
    return new BookResource(Book::find(1));
});

Route::get('nama', function () {
    return 'Namaku, Larashop API';
});

Route::post('umur', function () {
    return 17;
});

Route::get('category/{id?}', function ($id) {
    $categories = [
        1 => 'Programming',
        2 => 'Desain Grafis',
        3 => 'Jaringan Komputer',
    ];
    $id = (int) $id;
    if($id==0) return 'Silakan pilih kategori';
    else return 'Anda memilih kategori <b>'.$categories[$id].'</b>';
});

Route::domain('{category}.larashop.test')->group(function () {
    Route::get('book/{id}', function ($category, $id) {
        //
    });
});

Route::get('buku/{judul}', 'BookController@cetak');
Route::middleware(['cors'])->group(function () {
    Route::get('buku/{judul}', 'BookController@cetak');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::prefix('v1')->group(function () { 
    //Route::get('books', 'BookController@bookss');
    //Route::get('book/{id}', 'BookController@view')->where('id', '[0-9]+');
    
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    
    Route::get('categories/random/{count}', 'CategoryController@random');
    Route::get('books/top/{count}', 'BookController@top');


    Route::middleware('auth:api')->group(function () {
        Route::post('logout', 'AuthController@logout');
    });
});
