<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            max-width: 900px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            background: white;
            padding: 20px;
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        .table th {
            text-align: center;
        }
        .table td {
            vertical-align: middle;
            text-align: center;
        }
        .btn-primary, .btn-danger, .btn-warning {
            width: 100px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            opacity: 0.9;
        }
        .btn-danger:hover {
            background-color: #c82333;
            opacity: 0.9;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            opacity: 0.9;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center text-white fw-bold mb-4">Student Records</h1>
        
        <div class="text-center mb-3">
            <a class="btn btn-success" href="/insert">+ Create New</a>
        </div>

        <div class="card">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th style="width: 20%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                            <div class="d-flex flex-column gap-2">
        <a class="btn btn-danger btn-sm" href='delete/{{ $user->id }}'>Delete</a>
        <a class="btn btn-warning btn-sm" href="edit/{{ $user->id }}">Edit</a>
                          </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
