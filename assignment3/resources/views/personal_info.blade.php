<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            width: 600px;
            margin: auto;
            padding: 20px;
        }

        label {
            display: inline-block;
            width: 150px; 
            text-align: left;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input {
            width: 300px;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            width: auto; 
            margin-right: 5px;
        }

        .radio-group {
            display: inline-block;
        }

        
    </style>
</head>
<body>
    <h2 style="text-align: center;">Personal Information</h2>
    <form action="{{ route('submit') }}" method="POST">
        @csrf

        <label>First Name:</label>
        <input type="text" name="first_name" value="{{ old('first_name') }}" maxlength="50">
        @error('first_name') <p style="color:red;">{{ $message }}</p> @enderror
        <br>

        <label>Last Name:</label>
        <input type="text" name="last_name" value="{{ old('last_name') }}"  maxlength="50">
        @error('last_name') <p style="color:red;">{{ $message }}</p> @enderror
        <br>

        <label>Sex:</label>
        <div class="radio-group">
            <input type="radio" name="sex" value="Male" > Male
            <input type="radio" name="sex" value="Female"> Female
        </div>
        @error('sex') <p style="color:red;">{{ $message }}</p> @enderror
        <br>

        <label>Mobile Phone:</label>
<input type="text" name="mobile_phone" value="{{ old('mobile_phone') }}" 
       pattern="^(0998|0999|0920)-\d{3}-\d{3}$" 
       placeholder="0998-XXX-XXX" 
       title="Format: 0998-XXX-XXX, 0999-XXX-XXX, 0920-XXX-XXX">
@error('mobile_phone') 
    <p style="color:red;">{{ $message }}</p> 
@enderror

        <br>

        <label>Tel No.:</label>
        <input type="text" name="tel_no" value="{{ old('tel_no') }}">
        @error('tel_no') <p style="color:red;">{{ $message }}</p> @enderror
        <br>

        <label>Birth Date:</label>
        <input type="date" name="birth_date" value="{{ old('birth_date') }}">
        @error('birth_date') <p style="color:red;">{{ $message }}</p> @enderror
        <br>

        <label>Address:</label>
        <input type="text" name="address" value="{{ old('address') }}">
        @error('address') <p style="color:red;">{{ $message }}</p> @enderror
        <br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <p style="color:red;">{{ $message }}</p> @enderror
        <br>

        <label>Website:</label>
        <input type="url" name="website" value="{{ old('website') }}">
        @error('website') <p style="color:red;">{{ $message }}</p> @enderror
        <br>
         <div style="text-align: center;">
        <button type="submit">Submit</button>
        </div>
        @if (session('success'))
    <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
@endif

    </form>
</body>
</html>
