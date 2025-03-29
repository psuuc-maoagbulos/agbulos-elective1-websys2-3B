<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        Category::create(['name' => $request->name]);
        return redirect()->route('home', ['view' => 'categories'])->with('success', 'Category added successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('home', ['view' => 'categories'])->with('success', 'Category deleted successfully.');
    }
}