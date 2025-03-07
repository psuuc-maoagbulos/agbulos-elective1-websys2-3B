<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LastQuiz</title>
    <style>
        .btn{
            font-size: 16px; 
            background: blue; 
            border: none; 
            border-radius: 2px; 
            color: #fff; 
            width: 100px; 
            height: 24px;
            cursor: pointer;
        }
        .btn:hover{
            background: #fff;
            color: black;
            border: solid 0.5px black;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="select">Select Customer Name: </label>
        <select name="customername" id="select">
            <option value="111">Alex Caruso</option>
            <option value="222">Mike D Turtle</option>
            <option value="333">CM Punk</option>
        </select>
        <button type="submit" name="submit" class="btn" >Select</button>
    </form>
    <?php
        session_start();
        if(isset($_POST['submit'])){
            require('connection.php');
            $id = $_POST['customername'];

            $sql = "SELECT * FROM `customers` WHERE `custID` = $id";
            $result = $conn->query($sql);

            if($result->num_rows>0){
                while($rows = $result->fetch_assoc()){
                    $_SESSION['custName'] = $rows['custName'];
                    echo 'Customer ID: '. $id. '<br>';
                    echo  'Customer Name: '. $rows['custName']. '<br><br>'; 
                }
            }
            header('Refresh: 3;URL = selectrooms.php');
        }
    ?>
</body>
</html>