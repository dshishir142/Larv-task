<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\IndexController as ControllersIndexController;
use App\Models\comment;
use App\Models\photo;
use App\Models\video;
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




// Route::resource("blog", BlogController::class);
Route::get('/delete/{id}', [BlogController::class, 'destroy']);
Route::get('/edit/{id}', [BlogController::class,'edit']);

Route::get('/', [BlogController::class,'index'])->name('home'); 




Route::group(['prefix'=> '/blog'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('Blog.index');

    Route::post('/store', [BlogController::class, 'store']);

    Route::get('/view/{id}', [BlogController::class, 'show']);

    Route::get('/add', function () {
    return view('addblog');
    });

    Route::post('/edit/{id}', [BlogController::class,'update']);
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

Route::get('/test', [indexController::class,'index'])->middleware('guard');

Route::get('/testAdd', [indexController::class,'testAdd']);

Route::get('/onetomany', [IndexController::class,'testOneToMany']);

Route::get('/manytomany', [IndexController::class,'manyToMany']);

Route::get('/roletouser', [IndexController::class,'addRoleToUser']);
Route::get('/roletouser/remove', [IndexController::class,'removeRoleToUser']);


Route::get('/testmorph', function(){

    $data = comment::with('commentable')->get();
    return $data;
});