<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\v1\CategoriasController;
use App\Http\Controllers\v1\ClientesController;
use App\Http\Controllers\v1\ProveedoresController;
use App\Http\Controllers\v1\ProductosController;
use App\Http\Controllers\v1\UsersController;
use App\Http\Controllers\v1\SeguridadController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['auth:api'])->group(function (){

    
});


/*---------------------PROVEEDORES----------------- */
Route::get('/proveedores', [ProveedoresController::class, 'obtenerLista']);
Route::get('/proveedores/{id}', [ProveedoresController::class, 'obtenerItem']);


Route::post('/proveedores', [ProveedoresController::class, 'storage']);//storage=guardar
Route::put('/proveedores', [ProveedoresController::class, 'update']);
Route::patch('/proveedores', [ProveedoresController::class, 'patch']);

Route::delete('/proveedores/{id}', [ProveedoresController::class, 'delete']);


/*---------------------CLIENTES----------------- */
Route::get('/clientes', [ClientesController::class, 'obtenerLista']);
Route::get('/clientes/{id}', [ClientesController::class, 'obtenerItem']);

Route::post('/clientes', [ClientesController::class, 'storage']);//storage=guardar
Route::put('/clientes', [ClientesController::class, 'update']);
Route::patch('/clientes', [ClientesController::class, 'patch']);


Route::delete('/clientes/{id}', [ClientesController::class, 'delete']);


/*---------------------categorias----------------- */
Route::get('/categorias', [CategoriasController::class, 'obtenerLista']);
Route::get('/categorias/{id}', [CategoriasController::class, 'obtenerItem']);


Route::post('/categorias', [CategoriasController::class, 'storage']);//storage=guardar
Route::put('/categorias', [CategoriasController::class, 'update']);
Route::patch('/categorias', [CategoriasController::class, 'patch']);


Route::delete('/categorias/{id}', [CategoriasController::class, 'delete']);


/*---------------------Productos----------------- */


Route::get('/productos', [ProductosController::class, 'obtenerLista']);
Route::get('/productos/{id}', [ProductosController::class, 'obtenerItem']);



Route::post('/productos', [ProductosController::class, 'storage']);//storage=guardar
Route::put('/productos', [ProductosController::class, 'update']);
Route::patch('/productos', [ProductosController::class, 'patch']);


Route::delete('/productos/{id}', [ProductosController::class, 'delete']);

/*---------------------USERS----------------- */
Route::post('/users', [UsersController::class, 'store']);//storage=guardar



/*---------------------LOGIN----------------- */
Route::post('/seguridad/login', [SeguridadController::class, 'login']);//storage=guardar
