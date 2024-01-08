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
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/comics', function () {
    return view('comics.index');
})->name('comics');

Route::get('/404', function () {
    return view('pageNotFound');
})->name('404');

Route::get('/comics/{id}', function ($id) {
    $comics = config('comics.key');
    // if ($id >= 0 && $id < count($products)) {
    $comic = $comics[$id];

    return view('comics.show', compact('comic'));
    // } else {
    //     abort(404);
    // }
})->name('comics.show');

Route::fallback(function () {
    return redirect()->route('404');
});
