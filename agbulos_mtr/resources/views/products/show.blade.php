@extends('layouts.app')

@section('title', 'Product Details: ' . $product->name)

@section('content')
<style>
    .details-container {
        max-width: 700px;
        margin: 0 auto;
    }
    .card-header {
        background: linear-gradient(135deg, #007bff, #004085); /* Darker gradient for contrast */
    }
    .detail-label {
        color: #495057; /* Darker label color for readability */
        font-weight: 600;
        min-width: 120px;
        display: inline-block;
    }
    .card-body p {
        margin-bottom: 1rem;
    }
    .btn-back {
        transition: background-color 0.3s ease;
    }
    .btn-back:hover {
        background-color: #5a6268; /* Darker gray on hover */
    }
    .product-image {
        max-width: 300px;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    @media (max-width: 576px) {
        .detail-label {
            display: block;
            margin-bottom: 0.25rem;
        }
    }
</style>

<div class="container my-5">
    <div class="details-container">
        <div class="card shadow-lg border-0 animate__animated animate__fadeIn">
            <div class="card-header py-3">
                <h5 class="mb-0 fw-semibold text-white">Product Details</h5>
            </div>
            <div class="card-body p-4">
                <!-- Product Photo -->
                <div class="mb-4 text-center">
                    @if ($product->photo)
                        <img src="{{ asset('storage/' . $product->photo) }}" 
                             alt="{{ $product->name }}" 
                             class="product-image">
                    @else
                        <p class="text-muted"><i class="bi bi-image me-2"></i>No photo available</p>
                    @endif
                </div>

                <!-- Product Details -->
                <h5 class="card-title mb-4">{{ $product->name }}</h5>
                <p class="card-text">
                    <span class="detail-label">Description:</span> 
                    <span>{{ $product->description ?? 'N/A' }}</span>
                </p>
                <p class="card-text">
                    <span class="detail-label">Price:</span> 
                    <span>₱{{ number_format($product->price, 2) }}</span>
                </p>
                <p class="card-text">
                    <span class="detail-label">Stock Quantity:</span> 
                    <span>{{ $product->stock_quantity }}</span>
                    @if ($product->stock_quantity == 0)
                        <span class="badge bg-danger ms-2">Out of Stock</span>
                    @elseif ($product->stock_quantity < 10)
                        <span class="badge bg-warning ms-2">Low Stock</span>
                    @endif
                </p>
                <p class="card-text">
                    <span class="detail-label">Category:</span> 
                    <span>{{ $product->category->name }}</span>
                </p>
                <p class="card-text">
                    <span class="detail-label">Supplier:</span> 
                    <span>{{ $product->supplier->name }}</span>
                </p>

                <!-- Action Buttons -->
                <div class="mt-4">
                    <a href="{{ route('products.edit', $product) }}" 
                       class="btn btn-warning btn-sm me-2">
                        <i class="bi bi-pencil-square me-2"></i>Edit
                    </a>
                    <a href="{{ route('home', ['view' => 'products']) }}" 
                       class="btn btn-secondary btn-sm btn-back">
                        <i class="bi bi-arrow-left me-2"></i>Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap Icons (optional, if not already in layouts.app) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- Include Animate.css (optional) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
@endsection