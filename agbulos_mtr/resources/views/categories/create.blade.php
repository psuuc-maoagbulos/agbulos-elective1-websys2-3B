@extends('layouts.app')

@section('title', 'Add New Category')

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
                <h5 class="mb-0 fw-semibold text-white">Add New Category</h5>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('categories.store') }}" novalidate>
                    @csrf

                    <!-- Name Field -->
                    <div class="mb-4">
                        <label for="name" class="form-label fw-medium">Category Name <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name') }}"
                               placeholder="Enter category name"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="btn-group-form">
                        <button type="submit" class="btn btn-save px-4">
                            <i class="bi bi-save me-2"></i>Save Category
                        </button>
                        <a href="{{ route('home', ['view' => 'categories']) }}" 
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