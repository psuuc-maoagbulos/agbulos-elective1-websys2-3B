<!DOCTYPE html>
<html>
<head>
    <title>Problem1</title>
    <style>
        body{
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto; 
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Prime Number or Not?</h1>
    <form method="post" action="">
        <label for="numbers">Enter numbers:</label>
        <input type="text" name="numbers" id="numbers" required>
        <input type="submit" value="Submit">
    </form>

    <?php
    function isPrime($num) {
        if ($num <= 1) {
            return false;
        }
        for ($i = 2; $i * $i <= $num; $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }
        return true;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST["numbers"];
        $numbers = explode(",", $input);

        echo "<h2>Results</h2>";
        echo "<table>";
        echo "<tr><th>Number</th><th>Result</th></tr>";
        
        foreach ($numbers as $number) {
            $number = trim($number);
            if (is_numeric($number) && $number > 0) {
                $isPrime = isPrime($number);
                echo "<tr><td>$number</td><td>";
                echo $isPrime ? "PRIME" : "NOT A PRIME";
                echo "</td></tr>";
            } else {
                echo "<tr><td>$number</td><td>Invalid Input!!!</td></tr>";
            }
        }
        
        echo "</table>";
    }
    ?>

</body>
</html>
