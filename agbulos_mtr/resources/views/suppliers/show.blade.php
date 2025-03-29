@extends('layouts.app')

@section('title', 'Supplier Details: ' . $supplier->name)

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
                <h5 class="mb-0 fw-semibold text-white">Supplier Details</h5>
            </div>
            <div class="card-body p-4">
                <h5 class="card-title mb-4">{{ $supplier->name }}</h5>
                
                <p class="card-text">
                    <span class="detail-label">Contact Info:</span> 
                    <span>{{ $supplier->contact_info ?? 'N/A' }}</span>
                </p>

                <div class="mt-4">
                    <a href="{{ route('suppliers.edit', $supplier) }}" 
                       class="btn btn-warning btn-sm me-2">
                        <i class="bi bi-pencil-square me-2"></i>Edit
                    </a>
                    <a href="{{ route('home', ['view' => 'suppliers']) }}" 
                       class="btn btn-secondary btn-sm btn-back">
                        <i class="bi bi-arrow-left me-2"></i>Back to Suppliers
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection