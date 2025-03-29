<?php

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    $view = request('view', 'products'); // Default to products
    $search = request('search');
    $category_id = request('category_id');
    $supplier_id = request('supplier_id');

    if ($view === 'products') {
        $products = Product::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->when($category_id, function ($query, $category_id) {
            return $query->where('category_id', $category_id);
        })->when($supplier_id, function ($query, $supplier_id) {
            return $query->where('supplier_id', $supplier_id);
        })->with('category', 'supplier')->paginate(5);
        return view('home', compact('view', 'products', 'search'));
    } elseif ($view === 'suppliers') {
        $suppliers = Supplier::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(5);
        return view('home', compact('view', 'suppliers'));
    } elseif ($view === 'categories') {
        $categories = Category::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(5);
        return view('home', compact('view', 'categories'));
    }

    // Fallback to products
    $products = Product::with('category', 'supplier')->paginate(10);
    return view('home', compact('view', 'products', 'search'));
})->name('home');

Route::resource('products', ProductController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('categories', CategoryController::class);