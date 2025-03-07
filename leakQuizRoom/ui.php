<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Room Transaction Project</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<h2>Chrolinkz bading </h2>

<!-- Customer Dropdown -->
<label for="customerDropdown">Select Customer:</label>
<select id="customerDropdown">
    <?php
    // Fetch customers from the database
    $conn = new mysqli("localhost", "root", "", "customer");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query("SELECT Customer_ID, Customer_Name FROM Customer");

    while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['Customer_ID']}'>{$row['Customer_Name']}</option>";
    }

    $conn->close();
    ?>
</select>

<!-- Display Customer ID and Name -->
<div id="customerDetails"></div>

<!-- Transaction Table -->
<h3>Transaction Table</h3>
<table border="1" id="transactionTable" style="display: none;">
    <thead>
    <tr>
        <th>Transaction Number</th>
        <th>Room Number</th>
        <th>Name</th>
        <th>Price</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody id="transactionTableBody"></tbody>
</table>
<input type="button" value="logout" onclick="logout()">

<script>
    function logout(){
        $.ajax({
            url:'logout.php',
            type:'POST',
            success: function(){
            window.location='login.php';
            }

        });
    }
    $(document).ready(function () {
        // Hide table initially
        $("#transactionTable").hide();

        // Fetch and display customer details on dropdown change
        $("#customerDropdown").change(function () {
            var customerId = $(this).val();
            $.ajax({
                type: "POST",
                url: "get_customer_details.php",
                data: {customer_id: customerId},
                success: function (response) {
                    $("#customerDetails").html(response);

                    // Show the table when customer is selected
                    $("#transactionTable").show();

                    // Fetch and display transaction table
                    $.ajax({
                        type: "POST",
                        url: "get_transaction_table.php",
                        data: {customer_id: customerId},
                        success: function (response) {
                            $("#transactionTableBody").html(response);
                        }
                    });


                }
            });
        });
    });
</script>

</body>
</html>
