<!DOCTYPE html>
<html>
<head>
    <title>Philippine Currency Breakdown</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    body{
        background-color: aquamarine;
    }
</style>
<body>
    <div class="container mt-3">
        <form method="post">
            <div class="form-group">
                <label for="amount">Enter Amount in Pesos (0-9999):</label>
                <input type="number" class="form-control" id="amount" name="amount" min="0" max="9999" required>
            </div>
            <button type="submit" class="btn btn-primary">Generate</button>
        </form>

        <?php
        function amountToWords($number)
        {
            $words = array(
                'Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine',
                'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'
            );

            $tens = array(
                '', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'
            );

            if ($number < 20) {
                return $words[$number];
            } elseif ($number < 100) {
                return $tens[intval($number / 10)] . ($number % 10 ? '-' . $words[$number % 10] : '');
            } elseif ($number < 1000) {
                return $words[intval($number / 100)] . ' Hundred' . ($number % 100 ? ' and ' . amountToWords($number % 100) : '');
            } elseif ($number < 10000) {
                return $words[intval($number / 1000)] . ' Thousand' . ($number % 1000 ? ' ' . amountToWords($number % 1000) : '');
            } else {
                return 'Invalid amount';
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $amount = $_POST["amount"];

            if ($amount >= 0 && $amount <= 9999) {
                $bills_and_coins = array(1000, 500, 100, 50, 20, 10, 5, 1);
                echo '<div class="form-group">';
                foreach ($bills_and_coins as $bill_coin) {
                    $count = intdiv($amount, $bill_coin);
                    if ($count > 0) {
                        $amount %= $bill_coin;
                        echo '<input type="text" class="form-control" value="' . $count . ' x ' . $bill_coin . ' Peso' . ($count > 1 ? 's' : '') . '" readonly>';
                    }
                }

                $amount_in_words = amountToWords($_POST["amount"]);
                echo '<h3>Amount in Words:</h3>';
                echo '<div class="form-group">';
                echo '<input type="text" class="form-control" value=" ' . $amount_in_words . '" readonly>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<p class="text-danger">Please enter a valid amount between 0 and 9999 pesos.</p>';
            }
        }
        ?>
    </div>
</body>
</html>
