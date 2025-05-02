<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Image Upload (Single + Multiple)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 22px;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        form {
            margin-bottom: 30px;
        }
        input[type="file"] {
            display: block;
            margin-bottom: 15px;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        .message {
            margin-top: 20px;
            padding: 12px;
            border-radius: 6px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Single Image Upload</h1>
        <form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" accept="image/*" required>
            <button type="submit">Upload</button>
        </form>

        <h1>Multiple Images Upload</h1>
        <form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="images[]" multiple accept="image/*" required>
            <button type="submit">Upload</button>
        </form>

        <a href="{{ route('photos.index') }}">→ View Photo Gallery</a>

        @if (session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="message error">{{ session('error') }}</div>
        @endif
    </div>
</body>
</html>
