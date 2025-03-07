<?php
function computeFactorial($n){
    if ($n ==0 || $n ==1){
        return 1;
    }
    else{
        return $n * computeFactorial($n-1);
    }

}

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["numbers"])){
    $inputNumbers=$_POST["numbers"];
    $numbersArray = explode(",",$inputNumbers);
    $factorialsArray = array();
    $totalFactorial=0;

    foreach ($numbersArray as $number) {
        $factorial = computeFactorial(intval($number));
        $factorialsArray[] = $factorial;
        $totalFactorial += $factorial;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
</head>
<body>
    <h1>Factorial Calculator</h1>
 <form method="POST" action="">
    <label for="numbers">Enter numbers separated by commas:</label>
    <input type="text" id="numbers" name="numbers">
    <button type="submit">Submit</button>
 </form>   


<?php if (isset($factorialsArray) && !empty($factorialsArray)):?>
    <h2>Factorials:</h2>
    <select>
            <?php foreach ($factorialsArray as $factorial) : ?>
                <option><?php echo $factorial; ?></option>
            <?php endforeach; ?>
        </select>

    
    <h2>Total Facorial:</h2>
     <p><?php echo $totalFactorial; ?></p>
    <?php endif; ?>
</body>
</html>