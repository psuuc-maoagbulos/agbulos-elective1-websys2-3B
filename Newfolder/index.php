<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation System</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <h2>Reservation System</h2>
    
    <div>
        <label for="customerName">Customer Name:</label>
        <input type="text" id="customerName" oninput="searchCustomer()">
        <div id="customerInfo"></div>
    </div>

    <div>
        <h3>Reservation Details</h3>
        <label for="reserveNo">Reservation No:</label>
        <input type="text" id="reserveNo">
        
        <label for="reserveDate">Date of Reservation:</label>
        <input type="date" id="reserveDate">

        <label for="roomName">Room Name:</label>
        <select id="roomName"></select>

        <button onclick="addReservation()">Add Reservation</button>
    </div>

    <div>
        <h3>Reservation Table</h3>
        <table border="1" id="reservationTable">
        <thead>
    <tr>
        <th>Transno</th>
        <th>Reservation No</th>
        <th>Room Name</th>
        <th>Customer Name</th>
        <th>Price</th>
        <th>Date</th>
    </tr>
</thead>

            <tbody id="reservationTableBody"></tbody>
        </table>
    </div>

    <script src="script.js"></script>
</body>
</html>
