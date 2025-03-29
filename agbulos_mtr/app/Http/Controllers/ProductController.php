<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $view = $request->query('view', 'products'); 
        $search = $request->input('search'); 

        if ($view === 'suppliers') {
            $suppliers = Supplier::paginate(5);
            return view('home', compact('view', 'suppliers', 'search'));
        } elseif ($view === 'categories') {
            $categories = Category::paginate(5);
            return view('home', compact('view', 'categories', 'search'));
        }

        $products = Product::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
        })->with('category', 'supplier')->paginate(5);
        dd($products);

        return view('home', compact('view', 'products', 'search'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('products.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'photo' => 'nullable|image|max:5000', 
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('products', 'public');
            $data['photo'] = $path;
        }

        Product::create($data);
        return redirect()->route('home', ['view' => 'products'])->with('success', 'Product added successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('products.edit', compact('product', 'categories', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'photo' => 'nullable|image|max:5000', 
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            
            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }
            $path = $request->file('photo')->store('products', 'public');
            $data['photo'] = $path;
        }

        $product->update($data);
        return redirect()->route('home', ['view' => 'products'])->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('home', ['view' => 'products'])->with('success', 'Product deleted successfully.');
    }
}
