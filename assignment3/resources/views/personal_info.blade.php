<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #87CEFA, #B0E0E6);
        }
        .card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4"><i class="fas fa-user-circle"></i> Personal Information</h2>
            <form action="{{ route('submit') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-user"></i> First Name:</label>
                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" maxlength="50" >
                    @error('first_name') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-user"></i> Last Name:</label>
                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" maxlength="50" >
                    @error('last_name') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-venus-mars"></i> Sex:</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="sex" value="Male" >
                        <label class="form-check-label">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="sex" value="Female">
                        <label class="form-check-label">Female</label>
                    </div>
                    @error('sex') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-phone"></i> Mobile Phone:</label>
                    <input type="text" class="form-control" name="mobile_phone" value="{{ old('mobile_phone') }}" pattern="^(0998|0999|0920)-\d{3}-\d{3}$" placeholder="0998-XXX-XXX" title="Format: 0998-XXX-XXX, 0999-XXX-XXX, 0920-XXX-XXX" >
                    @error('mobile_phone') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-phone-alt"></i> Tel No.:</label>
                    <input type="text" class="form-control" name="tel_no" value="{{ old('tel_no') }}">
                    @error('tel_no') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-calendar-alt"></i> Birth Date:</label>
                    <input type="date" class="form-control" name="birth_date" value="{{ old('birth_date') }}" >
                    @error('birth_date') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-map-marker-alt"></i> Address:</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}" >
                    @error('address') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-envelope"></i> Email:</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" >
                    @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-globe"></i> Website:</label>
                    <input type="url" class="form-control" name="website" value="{{ old('website') }}">
                    @error('website') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-paper-plane"></i> Submit</button>
                </div>

                @if (session('success'))
                    <p class="text-success fw-bold text-center mt-3">{{ session('success') }}</p>
                @endif
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>
</html>
