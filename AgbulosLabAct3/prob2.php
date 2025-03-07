<!DOCTYPE html>
<html>
<head>
    <title>Problem2</title>
</head>
<style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
    </style>
<body>
    <h1>Decimal Converter</h1>
    <form method="post" action="">
        Enter Decimal Number: <input type="text" name="decimal_numbers">
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    function decimalToBinary($decimal) {
        $binary = '';
        while ($decimal > 0) {
            $remainder = $decimal % 2;
            $binary = $remainder . $binary;
            $decimal = (int)($decimal / 2);
        }
        return $binary;
    }

    function decimalToOctal($decimal) {
        $octal = '';
        while ($decimal > 0) {
            $remainder = $decimal % 8;
            $octal = $remainder . $octal;
            $decimal = (int)($decimal / 8);
        }
        return $octal;
    }

    function decimalToHexadecimal($decimal) {
        $hexadecimal = '';
        $hexChars = "0123456789ABCDEF";
        while ($decimal > 0) {
            $remainder = $decimal % 16;
            $hexadecimal = $hexChars[$remainder] . $hexadecimal;
            $decimal = (int)($decimal / 16);
        }
        return $hexadecimal;
    }

    if (isset($_POST['submit'])) {
        $decimalNumbers = explode(' ', $_POST['decimal_numbers']);
        ?>
        <table border="1">
            <tr>
                <th>Number</th>
                <th>Binary</th>
                <th>Octal</th>
                <th>Hexadecimal</th>
            </tr>
            <?php
            foreach ($decimalNumbers as $decimal) {
                $binary = decimalToBinary($decimal);
                $octal = decimalToOctal($decimal);
                $hexadecimal = decimalToHexadecimal($decimal);
                ?>
                <tr>
                    <td><?php echo $decimal; ?></td>
                    <td><?php echo $binary; ?></td>
                    <td><?php echo $octal; ?></td>
                    <td><?php echo $hexadecimal; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
    ?>
</body>
</html>
