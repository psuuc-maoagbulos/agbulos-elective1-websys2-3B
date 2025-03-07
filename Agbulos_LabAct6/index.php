<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        body {
            background-color: #f2e9e4; 
        }
        .container {
            background-color: #ffffff; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            padding: 20px; 
            margin-top: 50px; 
        }
        h2 {
            color: #333333; 
        }
        .btn-primary {
            background-color: #4e97e2; 
            border-color: #4e97e2; 
        }
        .btn-primary:hover {
            background-color: #4184d7; 
            border-color: #4184d7; 
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mb-4">Book Info CRUD</h2>
    <form id="addForm" action="addbook.php" method="post">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn">
            </div>
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="classification" class="form-label">Classification</label>
                <input type="text" class="form-control" id="classification" name="classification">
            </div>
            <div class="col-md-6 mb-3">
                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher">
            </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Add Book</button>
        </div>
    </form>

    
    <h2 class="mt-5 mb-4">Book List</h2>
    <table id="bookTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ISBN</th>
                <th>Title</th>
                <th>Classification</th>
                <th>Publisher</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="main.js"></script>

<script>
    $(document).ready(function() {
       
        var dataTable = $('#bookTable').DataTable({
            ajax: {
                url: 'getbook.php',
                dataSrc: ''
            },
            columns: [
                { data: 'isbn', type: 'num' },
                { data: 'title', type: 'string' },
                { data: 'classification', type: 'string' },
                { data: 'publisher', type: 'string' },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                            <button class="btn btn-danger delete">Delete</button>
                            <a class="btn btn-primary" href="edit.php?bookid=${data.bookid}">Edit</a>
                        `;
                    }
                }
            ]
        });

        
        $('#addForm').submit(function(event) {
            event.preventDefault();

            
            var isbn = $('#isbn').val();
            var title = $('#title').val();
            var classification = $('#classification').val();
            var publisher = $('#publisher').val();

            if (isbn === '' || title === '' || classification === '' || publisher === '') {
                
                Swal.fire({
                    title: 'Error!',
                    text: 'Please fill in all required fields',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            } else {
               
                $.ajax({
                    type: 'POST',
                    url: 'addbook.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        
                        if (response === 'success') {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Book added successfully',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                  
                                    dataTable.clear().draw();
                                    dataTable.ajax.reload();

                                   
                                    $('#addForm')[0].reset();
                                }
                            });
                        } else if (response === 'error_database') {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Error adding book to the database',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Unexpected error occurred',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            }
        });

       
        function fetchBookList() {
            dataTable.ajax.reload();
        }

        $('#bookTable tbody').on('click', 'button.delete', function() {
            var data = dataTable.row($(this).parents('tr')).data();

            
            $('#deleteModal').modal('show');

          
            $('#confirmDelete').attr('data-id', data.bookid);
        });

        
        $('#confirmDelete').on('click', function() {
            var bookId = $(this).attr('data-id');

            $.ajax({
                type: 'POST',
                url: 'delete.php',
                data: { bookid: bookId },
                success: function(response) {
                    
                    if (response === 'success') {
                        
                        Swal.fire({
                            title: 'Success!',
                            text: 'Book deleted successfully',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                fetchBookList();
                                $('#deleteModal').modal('hide');
                            }
                        });
                    } else {
                      
                        Swal.fire({
                            title: 'Error!',
                            text: 'Error deleting book',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            });
        });
    });
</script>


<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this book?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
