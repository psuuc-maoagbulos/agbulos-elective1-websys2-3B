<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photo Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .top-bar a {
            background-color: #28a745;
            color: #fff;
            padding: 10px 14px;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }
        .top-bar a:hover {
            background-color: #218838;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
        }
        .photo {
            width: calc(25% - 16px);
            background: #f9f9f9;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            text-align: center;
        }
        .photo img {
            max-width: 100%;
            border-radius: 6px;
            margin-bottom: 10px;
        }
        .photo form {
            display: inline-block;
        }
        .photo button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .photo button:hover {
            background-color: #c82333;
        }
        .message {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .pagination {
            margin-top: 30px;
            text-align: center;
        }
        .pagination > * {
            margin: 0 5px;
        }

        @media (max-width: 768px) {
            .photo {
                width: calc(50% - 16px);
            }
        }

        @media (max-width: 500px) {
            .photo {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <h1>Photo Gallery</h1>
            <a href="{{ route('photos.create') }}">Upload New Photos</a>
        </div>

        @if (session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="message error">{{ session('error') }}</div>
        @endif

        <div class="gallery">
            @foreach ($photos as $photo)
                <div class="photo">
                    <img src="{{ $photo->image_url }}" alt="{{ $photo->image }}">
                    <form action="{{ route('photos.destroy', $photo) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this photo?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="pagination">
            {{ $photos->links() }}
        </div>
    </div>
</body>
</html>
