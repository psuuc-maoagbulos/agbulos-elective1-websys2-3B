<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Create-Read-Update-Delete</title>
</head>

<body>
    <?php
    $connect = mysqli_connect("localhost", "root", "", "contact_org");

    if ($connect === false) {
        die("Unable to connect to the database: " . mysqli_connect_error());
    }


    $sql = "SELECT * FROM contact_info";


    if ($result = mysqli_query($connect, $sql)) {
        if (mysqli_num_rows($result) > 0) {
    ?>
            <div class="container">
                <button type="submit" class="btn btn-primary my-5">
                    <a href="user.php" class="text-light" style="text-decoration: none;">Add User</a>
                </button>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Full name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Number</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['number'] ?></td>
                                <td><img src="<?= $row['image'] ?>" width="100px" height="100px"></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    <?php
        } else {
            echo "No records found";
        }
    } else {
        echo "ERROR: Could not execute the SQL query. " . mysqli_error($connect);
    }


    mysqli_close($connect);
    ?>
</body>

</html>