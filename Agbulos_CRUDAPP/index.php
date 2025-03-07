<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: aliceblue;
        }
        .gold-row {
            background-color: aliceblue;
        }
        .btn-padding {
            padding: 2px;
        }
    </style>
    <title>Create-Read-Update-Delete</title>
</head>
<body>
    <?php
    include 'config.php';

    $sql = "SELECT * FROM `contact_info`";
    $result = mysqli_query($con, $sql);
    ?>
    <div class="container my-5">
        <button type="submit" class="btn btn-primary">
            <a href="user.php" class="text-light" style="text-decoration: none;">Add New User</a>
        </button>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Number</th>
                    <th scope="col">Full name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Mobile number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $address = $row['address'];
                        $email = $row['email'];
                        $number = $row['number'];
                        $sex = $row['sex'];
                        $image = $row['image'];

                        echo '<tr class="gold-row">
                            <td>' . $id . '</td>
                            <td>' . $name . '</td>
                            <td>' . $address . '</td>
                            <td>' . $number . '</td>
                            <td>' . $email . '</td>
                            <td>' . $sex . '</td>
                            <td>' . $image . '</td>
                            <td>
                                <button class="btn btn-primary btn-padding"> 
                                    <a href="update.php?updateid=' . $id . '" class="text-light">Update</a>
                                </button>
                                <button class="btn btn-primary btn-padding"> 
                                    <a href="delete.php?deleteid=' . $id . '" class="text-light">Delete</a>
                                </button>
                            </td>
                        </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="container my-5">
        <form method="post">
            <center>
                <input type="text" placeholder="Search User" name="search">
                <button class="btn btn-primary" name="submit">Search</button>
            </center>
        </form>
        <div class="container my-5"></div>
        <table class="table">
            <?php
            if (isset($_POST['submit'])) {
                $search = $_POST['search'];

                $sql = "SELECT * FROM `contact_info` WHERE id = '$search'";
                $result = mysqli_query($con, $sql);

                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        echo '<thead>
                            <th scope="col">Full name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Mobile number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Sex</th>
                            <th scope="col">Image</th>
                        ';

                        $row = mysqli_fetch_assoc($result);
                        echo '<tbody>
                            <tr>
                                <td>' . $row['name'] . '</td>
                                <td>' . $row['address'] . '</td>
                                <td>' . $row['number'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>' . $row['sex'] . '</td>
                                <td>' . $row['image'] . '</td>
                            </tr> 
                        </tbody>';
                    } else {
                        echo '<h2>DATA NOT FOUND</h2>';
                    }
                }
            }
            ?>
        </table>
    </div>
</body>
</html>
