<?php
    include 'config.php'; 
    $id=$_GET['updateid'];
    $sql="Select * from `contact_info` where id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $name=$row['name'];
    $address=$row['address'];
    $email=$row['email'];
    $number=$row['number'];
    $sex=$row['sex'];
    $image=$row['image'];

    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $number=$_POST['number'];
        $sex=$_POST['sex'];
        $image=$_POST['image'];

        $sql="update `contact_info` set id=$id,name='$name',address='$address',email='$email',number='$number',sex='$sex',image='$image'
        where id=$id";
        $result=mysqli_query($con,$sql);
        if($result){
            header('location:index.php');
        }else{
            die(mysqli_error($con));
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: aliceblue;
        }
    </style>
    <title>Contact Organizer Form</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Full name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your full name" value="<?php echo $name; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter your address" value="<?php echo $address; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Mobile Number</label>
                <input type="text" class="form-control" name="number" placeholder="Enter your mobile" value="<?php echo $number; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" value="<?php echo $email; ?>">
            </div>

            <br>

            <div class="mb-3">
                <label class="form-label">Sex</label>
                <br>
                <input type="radio" name="sex" value="Female" <?php echo ($sex === 'Female') ? 'checked' : ''; ?>> Female
                <input type="radio" name="sex" value="Male" <?php echo ($sex === 'Male') ? 'checked' : ''; ?>> Male
            </div>

            <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                <input type="file" name="image" id="image" accept=".jpeg, .jpg, .png"> <br> <br>
                <button type="submit" class="btn btn-primary" name="submit" style="align:center;">UPDATE</button>
            </form>
        </form>
    </div>
</body>
</html>
