<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathController extends Controller
{
    public function compute($operation1, $num1, $num2, $operation2, $num3, $num4)
    {
        // Perform first operation
        $result1 = $this->calculate($operation1, $num1, $num2);
        $color1 = $this->getColor($result1);

        // Perform second operation
        $result2 = $this->calculate($operation2, $num3, $num4);
        $color2 = $this->getColor($result2);

        // Generate HTML response
        $html = "
            <html>
            <head>
                <title>Math Operations</title>
                <style>
                    .green-box { background-color: green; color: white; padding: 10px; display: inline-block; }
                    .blue-box { background-color: blue; color: white; padding: 10px; display: inline-block; }
                    .orange { color: orange; }
                    .blue { color: blue; }
                </style>
            </head>
            <body>
                <h2>Math Operations</h2>

                <p>Value 1: <span class='orange'>{$num1}</span></p>
                <p>Value 2: <span class='blue'>{$num2}</span></p>
                <p>Operator: {$operation1}</p>
                <p>Result: <span class='{$color1}'>{$result1}</span></p>

                <p>Value 1: <span class='orange'>{$num3}</span></p>
                <p>Value 2: <span class='blue'>{$num4}</span></p>
                <p>Operator: {$operation2}</p>
                <p>Result: <span class='{$color2}'>{$result2}</span></p>
            </body>
            </html>
        ";

        return response($html);
    }

    private function calculate($operation, $num1, $num2)
    {
        if ($num2 == 0 && $operation == 'divide') {
            return "Error: Cannot divide by zero!";
        }

        return match ($operation) {
            'add' => $num1 + $num2,
            'subtract' => $num1 - $num2,
            'multiply' => $num1 * $num2,
            'divide' => $num1 / $num2,
            default => "Invalid operation"
        };
    }

    private function getColor($result)
    {
        if (!is_numeric($result)) return "error";
        return ($result % 2 == 0) ? "green-box" : "blue-box";
    }
}
