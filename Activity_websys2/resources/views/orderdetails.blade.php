<!DOCTYPE html>
<html>
<head>
    <title>Order Details View</title>
</head>
<body>
    <h2>Order Details</h2>
    <form>
        <label>Transaction No:</label>
        <input type="text" value="{{ $transNo }}" readonly><br>

        <label>Order No:</label>
        <input type="text" value="{{ $orderNo }}" readonly><br>

        <label>Item ID:</label>
        <input type="text" value="{{ $itemId }}" readonly><br>

        <label>Name:</label>
        <input type="text" value="{{ $name }}" readonly><br>

        <label>Price:</label>
        <input type="text" value="{{ $price }}" readonly><br>

        <label>Quantity:</label>
        <input type="text" value="{{ $qty }}" readonly><br>
    </form>
</body>
</html>
