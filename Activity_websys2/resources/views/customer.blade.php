<!DOCTYPE html>
<html>
<head>
    <title>Customer View</title>
</head>
<body>
    <h2>Customer Information</h2>
    <form>
        <label>Customer ID:</label>
        <input type="text" value="{{ $id }}" readonly><br>

        <label>Name:</label>
        <input type="text" value="{{ $name }}" readonly><br>

        <label>Address:</label>
        <input type="text" value="{{ $address }}" readonly><br>
    </form>
</body>
</html>
