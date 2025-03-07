<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
</head>
<body>
    <table border=2>
        <tr>
            <th>Transaction Number</th>
            <th>Reservation Number</th>
            <th>Room Number</th>
            <th>Room Name</th>
            <th>Customer Name</th>
            <th>Date</th>
        </tr>
    <?php
        require('connection.php');
        if(!isset($_SESSION['custName'])){
            header('Location: selectname.php');
            exit();
        }

        $joinsql = "SELECT transNo, reservationNo, roomNo, roomName, custName, date FROM transaction JOIN reservation ON transaction.reservationNo = reservation.reservatoinNo";
        $contain = $conn->query($joinsql) or die ("Error running query $joinsql");
        while($data = $contain->fetch_array()){
            echo "<tr>
                    <td>$data[0]</td>
                    <td>$data[1]</td>
                    <td>$data[2]</td>
                    <td>$data[3]</td>
                    <td>$data[4]</td>
                    <td>$data[5]</td>
                </tr>";
        }
        $contain->free_result();
        $conn->close();
    ?>
    </table>
    <form method="post">
        <button type="submit" name="logout">End Transaction</button>
    </form>
    <?php
        if(isset($_POST['logout'])){
            session_destroy();
            header('Location: selectname.php');
        }
    ?>
</body>
</html>
