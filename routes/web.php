<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Models\Demo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/blog', [BlogController::class, 'index'])->name('Blog.index');
Route::post('/blog/store', [BlogController::class, 'store']);
Route::get('/blog/view/{id}', [BlogController::class, 'show']);
Route::get('/delete/{id}', [BlogController::class, 'destroy']);
Route::get('/edit/{id}', [BlogController::class,'edit']);
Route::post('/blog/edit/{id}', [BlogController::class,'update']);

Route::get('/', [BlogController::class,'index'])->name('home'); 

Route::get('/blog/add', function () {
    return view('addblog');
});
// Route::get('/demo/{name}/{id?}', function($name, $id = null) {
//     $data = compact('name','id');
//     // print_r(json_encode($data));
//     return view('demo', $data);
// });



// Route::get('/demogetdata', function () {
//     $demoData = Demo::all()->toArray();
//     echo "<pre>";
//     print_r($demoData);
//     print_r("Name is ". $demoData[0]["name"]);
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
