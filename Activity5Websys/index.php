<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5)), url('bg.jpg') center/cover fixed no-repeat;
            color: black;
        }

        .navbar {
            background-color: transparent;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.7); /* Slightly transparent white */
            border: 1px solid #dddfe2;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white for text fields */
        }

        .btn-primary {
            background-color: #1877f2;
            border-color: #1877f2;
        }

        .btn-primary:hover {
            background-color: #1560db;
            border-color: #1560db;
        }
    </style>
    <title>Blog System</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand text-white" href="#">Blog System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link text-white" href="#">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">CREATE BLOG ENTRY</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">LOGOUT</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto form-container">
            <form>
                <div class="form-group">
                    <label for="blogEntry">Blog Entry</label>
                    <input type="text" class="form-control" id="blogEntry" placeholder="Enter Blog Entry">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" rows="5" placeholder="Enter Blog Content"></textarea>
                </div>
                <div class="form-group">
                    <label for="imageUpload">Upload Image</label>
                    <input type="file" class="form-control-file" id="imageUpload" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Add Entry</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
