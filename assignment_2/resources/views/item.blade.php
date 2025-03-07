<!DOCTYPE html>
<html>
<head>
    <title>Item View</title>
</head>
<body>
    <h2>Item Information</h2>
    <form>
        <label>Item No:</label>
        <input type="text" value="{{ $itemNo }}" readonly><br>
          <br>
        <label>Name:</label>
        <input type="text" value="{{ $name }}" readonly><br>
         <br>
        <label>Price:</label>
        <input type="text" value="{{ $price }}" readonly><br>
    </form>
</body>
</html>
