<!DOCTYPE html>
<html>
<head>
    <title>Contact Organizer</title>
    <!-- Include Bootstrap and Datatables CSS/JS -->
</head>
<body>
    <div class="container">
        <h1>Contact Organizer</h1>
        <a href="add_contact.php" class="btn btn-primary">Add Contact</a>

        <table id="contactTable" class="table">
            <!-- Datatable content goes here -->
        </table>
    </div>

    <!-- Include Bootstrap and Datatables JavaScript -->
    <script>
        $(document).ready(function() {
            $('#contactTable').DataTable({
                "ajax": "contacts_data.php",
                "columns": [
                    // Define columns here
                ]
            });
        });
    </script>
</body>
</html>
