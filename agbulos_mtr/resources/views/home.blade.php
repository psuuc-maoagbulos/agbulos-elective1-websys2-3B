@extends('layouts.app')

@section('content')
<style>
    .tab-content-card {
        transition: all 0.3s ease;
    }
    .table th {
        white-space: nowrap;
        color: #fff;
    }
    .action-btn-group .btn {
        margin-right: 5px;
        transition: transform 0.2s ease;
    }
    .action-btn-group .btn:hover {
        transform: translateY(-2px);
    }
    .search-container {
        max-width: 500px;
    }
    .card-header {
        background: linear-gradient(135deg, #007bff, #004085);
    }
    .btn-add {
        background-color: #28a745;
        border-color: #28a745;
        color: white;
        min-width: 120px;
        transition: background-color 0.3s ease;
    }
    .btn-add:hover {
        background-color: #218838;
        border-color: #1e7e34;
        color: white;
    }
    .pagination-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }
    .pagination-info {
        font-size: 0.9rem;
        color: #6c757d;
    }
    .filter-dropdowns .form-select {
        width: auto;
        display: inline-block;
        margin-right: 15px;
    }
    @media (max-width: 768px) {
        .action-btn-group {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }
        .card-header {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 10px;
        }
        .btn-add {
            width: 100%;
        }
        .pagination-container {
            flex-direction: column;
            gap: 10px;
        }
        .filter-dropdowns .form-select {
            width: 100%;
            margin-bottom: 10px;
        }
    }
</style>

<div class="container my-5">
    <h1 class="mb-5 text-center display-4 fw-bold animate__animated animate__fadeIn">Inventory Management System</h1>

    <ul class="nav nav-pills mb-4 justify-content-center gap-2" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ $view === 'products' ? 'active' : '' }}" 
               href="{{ route('home', ['view' => 'products']) }}">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $view === 'suppliers' ? 'active' : '' }}" 
               href="{{ route('home', ['view' => 'suppliers']) }}">Suppliers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $view === 'categories' ? 'active' : '' }}" 
               href="{{ route('home', ['view' => 'categories']) }}">Categories</a>
        </li>
    </ul>

    <div class="tab-content-card">
        @if ($view === 'products')
            <div class="card shadow-lg border-0">
                <div class="card-header d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 fw-semibold text-white">Product Inventory</h5>
                    <a href="{{ route('products.create') }}" class="btn btn-add btn-sm px-3">
                        <i class="bi bi-plus-circle me-2"></i>Add Product
                    </a>
                </div>
                <div class="card-body p-4">
                    <!-- Search Form -->
                    <div class="search-container mx-auto mb-4">
                        <form method="GET" action="{{ route('home') }}">
                            <input type="hidden" name="view" value="products">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" 
                                       placeholder="Search products..." value="{{ request()->input('search', $search ?? '') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="{{ route('home', ['view' => 'products']) }}" 
                                   class="btn btn-outline-secondary">Clear</a>
                            </div>
                        </form>
                    </div>

                    <!-- Filter Dropdowns -->
                    <form method="GET" action="{{ route('home') }}" class="filter-dropdowns mb-4">
                        <input type="hidden" name="view" value="products">
                        <input type="hidden" name="search" value="{{ request()->input('search', $search ?? '') }}">
                        <select name="category_id" class="form-select" onchange="this.form.submit()">
                            <option value="" {{ !request('category_id') ? 'selected' : '' }}>All Categories</option>
                            @foreach (\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <select name="supplier_id" class="form-select" onchange="this.form.submit()">
                            <option value="" {{ !request('supplier_id') ? 'selected' : '' }}>All Suppliers</option>
                            @foreach (\App\Models\Supplier::all() as $supplier)
                                <option value="{{ $supplier->id }}" {{ request('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>

                    <!-- Products Table -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Category</th>
                                    <th>Supplier</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr class="{{ $product->stock_quantity == 0 ? 'table-danger' : '' }}">
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>₱{{ number_format($product->price, 2) }}</td>
                                        <td>
                                            {{ $product->stock_quantity }}
                                            @if ($product->stock_quantity == 0)
                                                <span class="badge bg-danger ms-2">Out of Stock</span>
                                            @elseif ($product->stock_quantity < 10)
                                                <span class="badge bg-warning ms-2">Low Stock</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->supplier->name }}</td>
                                        <td>
                                            <div class="action-btn-group">
                                                <a href="{{ route('products.show', $product) }}" 
                                                   class="btn btn-info btn-sm">View</a>
                                                <a href="{{ route('products.edit', $product) }}" 
                                                   class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('products.destroy', $product) }}" 
                                                      method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" 
                                                            onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <i class="bi bi-box-seam me-2"></i>No products found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    @if ($products->total() > $products->perPage())
                        <div class="pagination-container">
                            <div class="pagination-info">
                                Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} products
                            </div>
                            <nav aria-label="Product pagination">
                                {{ $products->appends(['view' => 'products', 'search' => $search ?? '', 'category_id' => request('category_id'), 'supplier_id' => request('supplier_id')])->links('pagination::bootstrap-5') }}
                            </nav>
                        </div>
                    @endif
                </div>
            </div>

        @elseif ($view === 'suppliers')
            <div class="card shadow-lg border-0">
                <div class="card-header d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 fw-semibold text-white">Suppliers</h5>
                    <a href="{{ route('suppliers.create') }}" class="btn btn-add btn-sm px-3">
                        <i class="bi bi-plus-circle me-2"></i>Register Supplier
                    </a>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact Info</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $supplier->id }}</td>
                                        <td>{{ $supplier->name }}</td>
                                        <td>{{ $supplier->contact_info ?? 'N/A' }}</td>
                                        <td>
                                            <div class="action-btn-group">
                                                <a href="{{ route('suppliers.show', $supplier) }}" 
                                                   class="btn btn-info btn-sm">View</a>
                                                <a href="{{ route('suppliers.edit', $supplier) }}" 
                                                   class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('suppliers.destroy', $supplier) }}" 
                                                      method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" 
                                                            onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">
                                            <i class="bi bi-truck me-2"></i>No suppliers found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($suppliers->total() > $suppliers->perPage())
                        <div class="pagination-container">
                            <div class="pagination-info">
                                Showing {{ $suppliers->firstItem() }} to {{ $suppliers->lastItem() }} of {{ $suppliers->total() }} suppliers
                            </div>
                            <nav aria-label="Supplier pagination">
                                {{ $suppliers->appends(['view' => 'suppliers'])->links('pagination::bootstrap-5') }}
                            </nav>
                        </div>
                    @endif
                </div>
            </div>

        @elseif ($view === 'categories')
            <div class="card shadow-lg border-0">
                <div class="card-header d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 fw-semibold text-white">Categories</h5>
                    <a href="{{ route('categories.create') }}" class="btn btn-add btn-sm px-3">
                        <i class="bi bi-plus-circle me-2"></i>Add Category
                    </a>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <div class="action-btn-group">
                                                <form action="{{ route('categories.destroy', $category) }}" 
                                                      method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" 
                                                            onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4">
                                            <i class="bi bi-tag me-2"></i>No categories found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($categories->total() > $categories->perPage())
                        <div class="pagination-container">
                            <div class="pagination-info">
                                Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} categories
                            </div>
                            <nav aria-label="Category pagination">
                                {{ $categories->appends(['view' => 'categories'])->links('pagination::bootstrap-5') }}
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
@endsection