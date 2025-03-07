<?php

namespace App\Http\Controllers;

// Ginagamit ang Request para makuha ang data mula sa HTTP request
use Illuminate\Http\Request;

class MathController extends Controller
{
    /**
     * Ang compute() function ang gagawa ng lahat ng kalkulasyon
     * at magbabalik ng resultang HTML.
     *
     * @param string $operation - Halimbawa: 'add', 'subtract', 'multiply', 'divide'
     * @param int $val1 - Unang numero
     * @param int $val2 - Pangalawang numero
     * @return \Illuminate\Http\Response
     */
    public function compute($operation, $val1, $val2)
    {
        // Ilagay ang Pangalan, Taon, at Seksyon para ipakita sa itaas ng output
        $name = "Michael Angelo O. Agbulos"; 
        $year = "3rd Year";      
        $section = "Section B";  

        // I-convert ang val1 at val2 mula string patungo integer
        $num1 = (int) $val1;
        $num2 = (int) $val2;

        // I-declare ang mga variable na gagamitin
        $result = 0;      // Para sa magiging resulta ng operation
        $error = '';      // Para sa anumang error message

        // Tignan kung anong klase ng operation ang gagawin
        switch ($operation) {
            case 'add':
                // Kapag 'add', i-add ang $num1 at $num2
                $result = $num1 + $num2;
                break;
            case 'subtract':
                // Kapag 'subtract', ibawas ang $num2 mula sa $num1
                $result = $num1 - $num2;
                break;
            case 'multiply':
                // Kapag 'multiply', i-multiply ang $num1 at $num2
                $result = $num1 * $num2;
                break;
            case 'divide':
                // Kapag 'divide', i-check muna kung zero ang $num2
                if ($num2 == 0) {
                    // Kung zero, bawal ang division at maglagay ng error
                    $error = "Error: Division by zero is not allowed.";
                } else {
                    // Kung hindi zero, i-divide ang $num1 sa $num2
                    $result = $num1 / $num2;
                }
                break;
            default:
                // Kapag wala sa case, invalid ang operation
                $error = "Invalid operation!";
        }

        // Kung may error, ipakita ito, kung wala, magpakita ng result
        if ($error) {
            // Ipakita ang error message na may pulang kulay at bold na text
            $output = "<p style='color: red; font-weight: bold;'>$error</p>";
        } else {
            // Alamin ang kulay ng text base sa even/odd ng $num1
            // Kung even, orange; kung odd, blue
            $color = ($num1 % 2 == 0) ? "orange" : "blue";

            // Alamin ang background color base sa even/odd ng $result
            // Kung even, green; kung odd, blue
            $bgColor = ($result % 2 == 0) ? "green" : "blue";

            // Buoin ang HTML output para ipakita ang mga value at ang resulta
            $output = "
                <p>Value 1: <span style='color: $color;'>$num1</span></p>
                <p>Value 2: <span style='color: blue;'>$num2</span></p>
                <p>Operator: $operation</p>
                <p style='background-color: $bgColor; padding: 10px; display: inline-block; color: white;'>Result: $result</p>
            ";
        }

        // Gawa ng header para sa Pangalan, Taon, at Seksyon
        $header = "
            <h2>$name - $year - $section</h2>
            <hr>
        ";

        // Ibalik bilang HTTP response ang pinagsamang header at output
        return response($header . $output);
    }
}
