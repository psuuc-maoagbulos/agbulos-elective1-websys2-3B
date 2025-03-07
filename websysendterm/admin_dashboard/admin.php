<?php
session_start();
if (!isset($_SESSION['admin'])) {
    // Redirect to the login page
    header("Location: ../user_registration/login.php");
    exit(); // Make sure to exit after sending the header to prevent further execution
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #FFA500;
            color: #fff;
            padding: 20px;
            position: fixed;
            height: 100%;
            overflow: auto;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center items vertically */
        }

        .content {
            flex: 1;
            padding: 20px;
            margin-left: 250px;
        }

        .user-list,
        .reports-content {
            width: 100%;
            overflow-x: auto;
        }

        .nav-link {
            color: #fff;
            margin-bottom: 10px;
            cursor: pointer;
            text-align: center; /* Center text for all screen sizes */
            padding: 10px;
            border-radius: 5px;
        }

        .nav-link:hover {
            background-color: #ddd; /* Add a background color on hover */
            color: #333;
        }

        .add-user-btn,
        .logout-btn {
            background-color: #FF4500;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            width: 100%; /* Make the button full width */
            border-radius: 5px;
        }

        .logout-btn {
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .dashboard {
                flex-direction: column;
            }

            .content {
                margin-left: 0;
            }

            .sidebar {
                width: 100%;
                position: static;
                background-color: #FFA500;
            }

            .nav-link {
                text-align: center; /* Center text for smaller screens */
            }
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        /* Improved table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        /* Modal styling */
        .modal-body {
            text-align: center;
        }

        .modal-footer {
            justify-content: center;
        }
        .ex{
            text-decoration: none;
            color: white;
        }
        .ex:hover{
             text-decoration: none;
            color: white;
        }
        .log{
            text-decoration: none;
            color: white;
        }
        .log:hover{
             text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <div class="sidebar">
            <h2>Admin Dashboard</h2>
            <div class="nav-link" onclick="openTab('user-tab')">User Account Management</div>
            <div class="nav-link" onclick="openTab('reports-tab')">Reports</div>
            <div class="nav-link" onclick="openTab('messages-tab')">User Messages</div>
            <button class="btn btn-danger logout-btn" data-toggle="modal" data-target="#logoutModal">Logout</button>
        </div>
        <div class="content">
            <div id="user-tab" class="tab-content">
                <h2>User Account Management</h2>
                <table id="userTable" class="table table-striped table-bordered user-list">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($_SESSION['admin'])){
                            $username=$_SESSION['admin'];
                            require '../connection.php';
                            $stmt = "select * from account";
                            $container = $conn->query($stmt);
                            while ($data = $container->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $data['accountid'] ?></td>
                                    <td><?php echo $data['username'] ?></td>
                                    <td><?php echo $data['email'] ?></td>
                                    <td>
                                        <button class="btn btn-warning"><a class="ex" href="examine.php?username=<?php echo $data['username'] ?>">Examine the post</a></button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $data['accountid']; ?>">Delete Account</button>
                                    </td>
    
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal<?php echo $data['accountid']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this account?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <a href="deleteaccount.php?id=<?php echo $data['accountid']; ?>" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Delete Modal -->
                                </tr>
                            <?php  } }
                       ?>
                    </tbody>
                </table>
            </div>
            <div id="reports-tab" class="tab-content" style="display: none;">
                <h2>Reports</h2>
                <table id="reportsTable" class="table table-striped table-bordered reports-list">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Report Description</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Retrieve reports from the database
                        require '../connection.php';
                        $stmt = "SELECT * FROM reports";
                        $container = $conn->query($stmt);

                        // Check if there are any reports
                        if ($container->num_rows > 0) {
                            while ($data = $container->fetch_assoc()) {
                                echo '<tr>
                                            <td>' . $data['name'] . '</td>
                                            <td>' . $data['report'] . '</td>
                                            <td><img src="../user_dashboard/reportimage/' . $data['image'] . '" alt="Report Image" style="max-width: 100px;"></td>
                                        </tr>';
                            }
                        } else {
                            echo '<tr><td colspan="4">No reports available</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="messages-tab" class="tab-content" style="display: none;">
                <h2>User Messages</h2>
                <table id="messagesTable" class="table table-striped table-bordered messages-list">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../connection.php';

                        $stmt = "SELECT * FROM contact";
                        $container = $conn->query($stmt);

                        // Check if there are any messages
                        if ($container->num_rows > 0) {
                            while ($data = $container->fetch_assoc()) {
                                echo '<tr>
                                            <td>' . $data['name'] . '</td>
                                            <td>' . $data['email'] . '</td>
                                            <td>' . $data['message'] . '</td>
                                        </tr>';
                            }
                            echo '</tbody>
                                </table>';
                        } else {
                            echo '<p>No messages from users.</p>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Logout Modal -->

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#userTable').DataTable();
        });

        function openTab(tabId) {
            var tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(function (tab) {
                tab.style.display = 'none';
            });
            document.getElementById(tabId).style.display = 'block';
        }
    </script>
</body>

</html>
