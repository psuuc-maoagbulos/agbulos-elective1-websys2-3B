@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<style>
    .form-container {
        max-width: 700px;
        margin: 0 auto;
    }
    .form-control:focus, .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .invalid-feedback {
        display: block;
    }
    .btn-group-form {
        display: flex;
        gap: 10px;
    }
    .card-header {
        background: linear-gradient(135deg, #007bff, #004085); /* Darker gradient for contrast */
    }
    .form-label {
        color: #495057; /* Darker label color for readability */
    }
    .btn-save {
        background-color: #28a745; /* Green for Save button */
        border-color: #28a745;
        transition: background-color 0.3s ease;
    }
    .btn-save:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
    @media (max-width: 576px) {
        .btn-group-form {
            flex-direction: column;
        }
        .btn-group-form .btn {
            width: 100%;
        }
    }
</style>

<div class="container my-5">
    <div class="form-container">
        <div class="card shadow-lg border-0 animate__animated animate__fadeIn">
            <div class="card-header py-3">
                <h5 class="mb-0 fw-semibold text-white">Add New Product</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf

                    <!-- Name Field -->
                    <div class="mb-4">
                        <label for="name" class="form-label fw-medium">Product Name <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name') }}"
                               placeholder="Enter product name"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div class="mb-4">
                        <label for="description" class="form-label fw-medium">Description</label>
                        <textarea name="description" 
                                  id="description" 
                                  class="form-control @error('description') is-invalid @enderror" 
                                  rows="3"
                                  placeholder="Enter product description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Photo Field -->
                    <div class="mb-4">
                        <label for="photo" class="form-label fw-medium">Photo</label>
                        <input type="file" 
                               name="photo" 
                               id="photo" 
                               class="form-control @error('photo') is-invalid @enderror" 
                               accept="image/*">
                        <small class="text-muted">Accepted formats: JPG, PNG, GIF</small>
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Price Field -->
                    <div class="mb-4">
                        <label for="price" class="form-label fw-medium">Price (₱) <span class="text-danger">*</span></label>
                        <input type="number" 
                               name="price" 
                               id="price" 
                               class="form-control @error('price') is-invalid @enderror" 
                               step="0.01" 
                               min="0"
                               value="{{ old('price') }}"
                               placeholder="Enter price (e.g., 99.99)"
                               required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Stock Quantity Field -->
                    <div class="mb-4">
                        <label for="stock_quantity" class="form-label fw-medium">Stock Quantity <span class="text-danger">*</span></label>
                        <input type="number" 
                               name="stock_quantity" 
                               id="stock_quantity" 
                               class="form-control @error('stock_quantity') is-invalid @enderror" 
                               min="0"
                               value="{{ old('stock_quantity') }}"
                               placeholder="Enter stock quantity"
                               required>
                        @error('stock_quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Category Field -->
                    <div class="mb-4">
                        <label for="category_id" class="form-label fw-medium">Category <span class="text-danger">*</span></label>
                        <select name="category_id" 
                                id="category_id" 
                                class="form-select @error('category_id') is-invalid @enderror" 
                                required>
                            <option value="" selected disabled>Select a category</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @empty
                                <option value="" disabled>No categories available</option>
                            @endforelse
                        </select>
                        
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Supplier Field -->
                    <div class="mb-4">
                        <label for="supplier_id" class="form-label fw-medium">Supplier <span class="text-danger">*</span></label>
                        <select name="supplier_id" 
                                id="supplier_id" 
                                class="form-select @error('supplier_id') is-invalid @enderror" 
                                required>
                            <option value="" selected disabled>Select a supplier</option>
                            @forelse ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @empty
                                <option value="" disabled>No suppliers available</option>
                            @endforelse
                        </select>
                       
                        @error('supplier_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="btn-group-form">
                        <button type="submit" class="btn btn-save px-4">
                            <i class="bi bi-save me-2"></i>Save Product
                        </button>
                        <a href="{{ route('home', ['view' => 'products']) }}" 
                           class="btn btn-outline-secondary px-4">
                            <i class="bi bi-arrow-left me-2"></i>Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap Icons (optional, if not already in layouts.app) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- Include Animate.css (optional) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
@endsection