<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntreeController;
use App\Http\Controllers\SortieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;

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

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');


Route::get('/categorie/add',[CategorieController::class,'add'])->name('addcategorie');
Route::get('/categorie/edit{id}',[CategorieController::class,'edit'])->name('editcategorie');
Route::post('/categorie/update',[CategorieController::class,'update'])->name('updatecategorie');
Route::get('/categorie/delete{id}',[CategorieController::class,'delete'])->name('deletecategorie');
Route::get('/categorie/getAll',[CategorieController::class,'getall'])->name('getallcategorie');
Route::post('/categorie/persist',[CategorieController::class,'persist'])->name('persistcategorie');

//route produit
Route::get('/produit/add',[ProduitController::class,'add'])->name('addproduit');
Route::get('/produit/edit{id}',[ProduitController::class,'edit'])->name('editproduit');
Route::post('/produit/update',[ProduitController::class,'update'])->name('updateproduit');
Route::get('/produit/delete{id}',[ProduitController::class,'delete'])->name('deleteproduit');
Route::get('/produit/getAll',[ProduitController::class,'getall'])->name('getallproduit');
Route::post('/produit/persist',[ProduitController::class,'persist'])->name('persistproduit');

Route::get('/entree/add',[EntreeController::class,'add'])->name('addentree');
Route::get('/entree/edit{id}',[EntreeController::class,'edit'])->name('editentree');
Route::post('/entree/update',[EntreeController::class,'update'])->name('updateentree');
Route::get('/entree/delete{id}',[EntreeController::class,'delete'])->name('deleteentree');
Route::get('/entree/getAll',[EntreeController::class,'getall'])->name('getallentree');
Route::post('/entree/persist',[EntreeController::class,'persist'])->name('persistentree');

//route produit
Route::get('/sortie/add',[SortieController::class,'add'])->name('addsortie');
Route::get('/sortie/edit{id}',[SortieController::class,'edit'])->name('editsortie');
Route::post('/sortie/update',[SortieController::class,'update'])->name('updatesortie');
Route::get('/sortie/delete{id}',[SortieController::class,'delete'])->name('deletesortie');
Route::get('/sortie/getAll',[SortieController::class,'getall'])->name('getallsortie');
Route::post('/sortie/persist',[SortieController::class,'persist'])->name('persistsortie');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
