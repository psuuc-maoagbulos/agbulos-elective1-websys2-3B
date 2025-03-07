<!DOCTYPE html>
<html>
<head>
    <title>Order View</title>
</head>
<body>
    <h2>Order Information</h2>
    <form>
        <label>Customer ID:</label>
        <input type="text" value="{{ $customerId }}" readonly><br>

        <label>Name:</label>
        <input type="text" value="{{ $name }}" readonly><br>

        <label>Order No:</label>
        <input type="text" value="{{ $orderNo }}" readonly><br>

        <label>Date:</label>
        <input type="text" value="{{ $date }}" readonly><br>
    </form>
</body>
</html>
