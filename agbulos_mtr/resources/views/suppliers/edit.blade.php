@extends('layouts.app')

@section('title', 'Edit Supplier: ' . $supplier->name)

@section('content')
<style>
    .form-container {
        max-width: 700px;
        margin: 0 auto;
    }
    .form-control:focus {
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
    .btn-update {
        background-color: #28a745; /* Green for Update button */
        border-color: #28a745;
        transition: background-color 0.3s ease;
    }
    .btn-update:hover {
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
                <h5 class="mb-0 fw-semibold text-white">Edit Supplier: {{ $supplier->name }}</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('suppliers.update', $supplier) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')

                    <!-- Supplier Name Field -->
                    <div class="mb-4">
                        <label for="name" class="form-label fw-medium">Supplier Name <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name', $supplier->name) }}"
                               placeholder="Enter supplier name"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Contact Info Field -->
                    <div class="mb-4">
                        <label for="contact_info" class="form-label fw-medium">Contact Info</label>
                        <input type="text" 
                               name="contact_info" 
                               id="contact_info" 
                               class="form-control @error('contact_info') is-invalid @enderror" 
                               value="{{ old('contact_info', $supplier->contact_info) }}"
                               placeholder="e.g., email or phone number">
                        @error('contact_info')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="btn-group-form">
                        <button type="submit" class="btn btn-update px-4">
                            <i class="bi bi-pencil-square me-2"></i>Update Supplier
                        </button>
                        <a href="{{ route('home', ['view' => 'suppliers']) }}" 
                           class="btn btn-outline-secondary px-4">
                            <i class="bi bi-arrow-left me-2"></i>Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection