<?php

use App\Http\Controllers\dashboard\PostController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Models\Category;
use Illuminate\Routing\RouteGroup;
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
})->name("home");

Route::get('/acerca-de', function () {
    return "Hola mundo";
});

Route::get('/hola/{nombre?}', function ($nombre = "Pepe") {                                //Se esta pasando un parametro a la ruta, en este
    return "Hola: $nombre  conocenos <a href='".route("about")."'>Nosotros</a>";      //caso es el nombre, el signo de ? es para que sea
});                                                                                     //opcional


Route::get('/sobre-nosotros', function () {
    return "<h1>Toda la informacion sobre nosotros</h1>";
})->name("about");

Route::get('home/{nombre?}/{apellido?}', function ($nombre = "pepe", $apellido = "Sanchez") {

    $posts = ["Post1", "Post2","Post3","Post4"];
    $posts2 = [];

    //return view('home')->with('nombre', $nombre)->with('apellido', $apellido); //Formas distintas de mandar datos a las views
    return view('home', ['nombre' => $nombre, 'apellido' => $apellido, 'posts' => $posts, 'posts2' => $posts2]);
})->name("home");

//Route::get('post', [PostController::class, 'index']);


Route::resource('dashboard/post', PostController::class);
// Route::resource('dashboard/category', CategoryController::class);
Route::post('dasboard/post/{post}/image', PostController::class);
