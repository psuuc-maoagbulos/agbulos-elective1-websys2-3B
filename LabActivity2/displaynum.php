<!DOCTYPE html>
<html>
<head>
    <title>Numbers divisible by 5 or 6 but not both</title>
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        .highlight {
            background-color: orange;
        }
    </style>
</head>
<body>
    <div class="center">
        <div>
            <h2>Numbers divisible by 5 or 6 but not both</h2>
            <table>
                <?php
                $Count = 0; 
                $sum = 0;
                echo '<tr>'; 
                for ($i = 1; $i <= 100; $i++) {
                    $highlight = false;
                    if (($i % 5 == 0 || $i % 6 == 0) && !($i % 5 == 0 && $i % 6 == 0)) {
                        $highlight = true;
                        $Count++;
                        $sum += $i;
                    }
                    echo '<td' . ($highlight ? ' class="highlight"' : '') . '>' . $i . '</td>';
                    if ($i % 10 == 0) {
                        echo '</tr><tr>'; 
                    }
                }
                echo '</tr>'; 
                ?>
            </table>
            <p>Sum of highlighted numbers: <?php echo $sum; ?></p>
            <p>Count of highlighted numbers: <?php echo $Count; ?></p>
        </div>
    </div>
</body>
</html>
