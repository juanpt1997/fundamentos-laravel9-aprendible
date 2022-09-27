<?php

use App\Http\Controllers\PostController;
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

// laravel9.test => welcome
// laravel9.test/contacto => contact
// laravel9.test/blog => blog
// laravel9.test/about => about
// No se coloca el nombre completo de la ruta ni el .blade.php
// Route::get('/', function () {
//     // No logic here, for that reason we use the method below
//     return view('welcome');
// });


Route::view('/', 'welcome')->name('home');
Route::view('/contacto', 'contact')->name('contact'); // Nótese que está escrito diferente el nombre que se pone en la url al nombre del archivo, de igual forma al que se consulta con route('')
//Route::view('/blog', 'blog', ['posts' => $posts])->name('blog'); // ? Asi funciona con $posts definido por fuera con la función view, también podemos hacer lo mismo que abajo con la función get, 
//? lo que contiene la función es lo que va a venir del controlador
// Route::get('/blog', function(){
//     $posts = [
//         ['title' => 'Primero'],
//         ['title' => 'Segundo'],
//         ['title' => 'tercero'],
//         ['title' => 'cuarto']
//     ];

//     return view('blog', ['posts' => $posts]);
// })->name('blog');
// Route::get('/blog', PostController::class)->name('blog'); // ? En el caso de que sea un controlador invocable (1 solo método)
Route::get('/blog', [PostController::class, 'index'])->name('posts.index'); // ? name('blog')
Route::get('/blog/create', [PostController::class, 'create'])->name('posts.create'); // ? Debe ir primero esta porque por el parametro de rutas intenta acceder primero a blog/{post}
Route::post('/blog', [PostController::class, 'store'])->name('posts.store'); // ? Debe ir primero esta porque por el parametro de rutas intenta acceder primero a blog/{post}
Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show'); // ? Parametros de rutas
Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('posts.edit'); // ? Parametros de rutas
Route::patch('/blog/{post}', [PostController::class, 'update'])->name('posts.update'); // ? put = reemplazar, patch = actualizar
Route::delete('/blog/{post}', [PostController::class, 'destroy'])->name('posts.destroy'); // ? put = reemplazar, patch = actualizar

Route::view('/about', 'about')->name('about');

// Route::post();
// Route::patch();
// Route::put();
// Route::delete();
// Route::options();

// Route::match(['put', 'patch'], '/', function(){
//     //
// });

// Route::any('/', function () {

// });