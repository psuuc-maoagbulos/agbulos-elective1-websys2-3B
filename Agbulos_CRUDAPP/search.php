<?php
  include 'config.php'; 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container my-5">
        
            <form method="post">
                <input type="text" placeholder="Search User" name="search">
                    <button class="btn btn-dark btn-sm" name="submit">Search</button>
            </form>
    
            <div class="containe my-5"></div>
            <table class="table">
                <?php
                if(isset($_POST['submit'])){
                    $search=$_POST['search'];

                    $sql="Select * from `contact_info` where id='$search'";
                    $result=mysqli_query($con,$sql);
                    if($result){
                    if(mysqli_num_rows($result)>0){
 

                        echo'<thead>
                     
                        <th scope="col">Full name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Mobile number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Image</th>
                        ';
                      $row=mysqlI_fetch_assoc($result);
                        echo '<tbody>
                        <tr>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['address'].'</td>
                        <td>'.$row['number'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['sex'].'</td>
                            </tr> 
                            </tbody>'; 

                        }else{
                            echo' <h2>NO DATA FOUND </h2>';
                        }                   
                    }
                    
                }
                
                
                ?>

                </table>
                
    </div>
</body>
</html>
