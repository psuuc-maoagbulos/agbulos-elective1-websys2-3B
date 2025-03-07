<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"> </script>
</head>
<body>
    <h2>REMOVAL BADING</h2>

    <label for="customerTextbox">Enter Customer ID:</label>
<input type="text" id="customerTextbox">
<div id="customerDetails"></div>
     <?php
     $conn= new mysqli("localhost", "root", "","customer");

     if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
     }
     $result= $conn->query("SELECT Customer_ID, Customer_Name FROM Customer ");

     while ($row=$result->fetch_assoc()){
        echo "<option value='{$row['Customer_ID']}'>{$row['Customer_Name']}</option>";
}
 $conn->close();
    ?>
    </select>
    <div id="customerDetails"></div>

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

<script> 
$(document).ready(function(){
    $("#transactionTable").hide();

    $("#customerDropdown").change(function(){
        var customerId=$(this).val();
        $.ajax({
       type:"POST",
       url:"get_customer_details.php",
       data:{customer_id : customerId},
       success:function(response){
        $("#customerDetails").html(response);
        $("#transactionTable").show();

      $.ajax({
        type:"POST",
        url:"get_transaction_table.php",
        data:{customer_id : customerId},
        success:function(response){
            $("#transactionTableBody").html(response);
        }

      })
       }
        })
    });
});
</script>

</body>
</html>