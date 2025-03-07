<?php
    session_start();
?>
<head>
    <style>
        button{
            margin-left: 4px; 
            background: green; 
            width: 200px;
            border:none; 
            border-radius: 2px; 
            height: 30px; 
            color: #fff
        }
        button:hover{
            background: black;
            color: #fff;
            border: solid 0.2px black;
            cursor: pointer;
        }
    </style>
</head>
<form action="" method="post">
    <label for="reserveno">Reservation No: </label>
    <input type="number" name="reserveNo" id="reserveno"><br>
    <label for="dater">Date: </label>
    <input type="date" name="dater" id="dater"><br>
    <br>
    <table border=2>
        <tr>
            <th></th>
            <th>Room Number</th>
            <th>Room Name</th>
            <th>Price</th>
        </tr>
        <?php
        if(!isset($_SESSION['custName'])){
            header('Location: selectname.php');
            exit();
        }
        require('connection.php');
            $selectrooms = "Select * from rooms";
            $rooms = $conn->query($selectrooms);

            if($rooms->num_rows>0){
                while($display = $rooms->fetch_assoc()){
                    echo '<tr>';
                        echo '<td><input type="checkbox" name="checkboxes[]" id="rooms" value="'.$display['roomNo'].'"></td>';
                        echo '<td>Room '. $display['roomNo'].'</td>';
                        echo '<td>'. $display['roomName'].'</td>';
                        echo '<td>P '. $display['price'].'</td>';
                    echo '</tr>';
                }
            }
        ?>

    </table><br>
    <label for="date2">Date: </label>
    <input type="date" name="date2" id="date2">
    <br><br>
    <button type="submit" name="reserve" >Reserve</button>
</form>
<?php
    if (isset($_POST['reserve'])) {
        $insertsql = "";
        $inserttrans = "";
        $reserveno = $_POST['reserveNo'];
        $date1 = $_POST['dater'];
        $date2 = $_POST['date2'];
        $insertsql = "";

        if (isset($_POST['checkboxes'])) {
            foreach ($_POST['checkboxes'] as $selectedCheckbox) {
                $sql = "SELECT * FROM `rooms` WHERE `roomNo` = $selectedCheckbox";

                $result = $conn->query($sql);
                if($result->num_rows>0){
                    while($data = $result->fetch_assoc()){
                        $insertsql = "INSERT INTO `reservation`(`reservatoinNo`, `roomNo`, `roomName`, `price`, `custName`) VALUES ('$reserveno','$data[roomNo]','$data[roomName]','$data[price]','$_SESSION[custName]')";
                        $inserttrans = "INSERT INTO `transaction`(`reservationNo`, `date`) VALUES ('$reserveno','$date1')";
                    }
                }
                }
            }
        else {
            echo 'No checkboxes selected.';
        }

        $insert = $conn->query($insertsql);
        $transactioninsertquery = $conn->query($inserttrans);
        if($insert && $transactioninsertquery){
            header('Location: transactions.php');
        }else{
            echo "gaagaga";
        }

    }
    
?>
