<?php
    include 'config.php';
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="Delete from `contact_info` where id=$id";
        $result=mysqli_query($con,$sql);
        if($result){
            echo'<center><h1>Delete Succesful!</h1>';
            header('location:index.php');
       
            
        }else{
            die(mysqli_error($con));
        }

    }

    ?>