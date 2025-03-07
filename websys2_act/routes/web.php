<?php
use App\Http\Controllers\StudInsertController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/break/{$i}',[ MainController::class, 'compute']);
// Route::get('edit-records',[StudInsertController::class, 'index']);
// Route::get('edit/{id}', [StudInsertController::class, 'show']);
// Route::post('edit/{id}', [StudInsertController::class,'edit']);
Route::get('view-records', [StudInsertController::class,'index']);
Route::get('insert',[StudInsertController::class, 'insertform']);
// Route::post('create',[StudInsertController::class, 'insert']);
Route::post('create', [StudInsertController::class, 'insert']);
Route::get('delete/{id}', [StudInsertController::class, 'destroy']);