<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            background: white;
        }
        .btn-warning, .btn-primary {
            width: 140px;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            opacity: 0.9;
        }
        .btn-primary:hover {
            background-color: #007bff;
            opacity: 0.9;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="card-body">
                        <h3 class="text-center text-dark fw-bold mb-4">Update Student</h3>
                        <form action="/edit/<?php echo $users[0]->id; ?>" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="stud_name" placeholder="Enter Name" value="<?php echo $users[0]->name; ?>">
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <input class="btn btn-warning me-3" type="submit" value="Update">
                                <a class="btn btn-primary" href="/view-records">View Records</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
