<?php

// Ide-declare ang namespace ng controller na ito
namespace App\Http\Controllers;

// I-import ang Request class mula sa Laravel
use Illuminate\Http\Request;

// Gumawa ng MathController class na nag-e-extend sa Controller
class MathController extends Controller
{
    /**
     * Gagawa ng dalawang operasyon mula sa isang URL.
     * Halimbawa ng URL: /multiply/4/3/add/2/3
     *
     * @param string $op1  Unang operation (hal. add, subtract, multiply, divide)
     * @param int $val1    Unang value para sa unang operation
     * @param int $val2    Pangalawang value para sa unang operation
     * @param string $op2  Pangalawang operation
     * @param int $val3    Unang value para sa pangalawang operation
     * @param int $val4    Pangalawang value para sa pangalawang operation
     * @return \Illuminate\Http\Response Response na may computed output
     */
    public function computeMultiple($op1, $val1, $val2, $op2, $val3, $val4)
    {
        // I-define ang header information (personal information)
        $name    = "Michael Angelo O. Agbulos";
        $year    = "3rd Year";
        $section = "Section B";
        
        // Gawing formatted header
        $header  = "<h2>$name - $year - $section</h2><hr>";

        // I-compute ang unang operation gamit ang computeOperationOutput function
        $output1 = $this->computeOperationOutput($op1, $val1, $val2);

        // I-compute ang pangalawang operation gamit ang computeOperationOutput function
        $output2 = $this->computeOperationOutput($op2, $val3, $val4);

        // Pagsamahin ang final output na may line break bilang separator
        $finalOutput = $header . $output1 . "<br><br>" . $output2;
        
        // Ibalik ang response na may computed values
        return response($finalOutput);
    }

    /**
     * Private function para i-compute at i-format ang output para sa isang operation.
     *
     * @param string $operation  Uri ng operation (add, subtract, multiply, divide)
     * @param mixed $val1        Unang value
     * @param mixed $val2        Pangalawang value
     * @return string            HTML output ng result
     */
    private function computeOperationOutput($operation, $val1, $val2)
    {
        // I-convert ang mga values sa integer
        $num1 = (int)$val1;
        $num2 = (int)$val2;
        
        // I-initialize ang result at error variables
        $result = 0; 
        $error  = '';

        // Tukuyin ang operation gamit ang switch case
        switch ($operation) {
            case 'add':
                // gagawin ang Addition operation
                $result = $num1 + $num2;
                break;
            case 'subtract':
                //gagawin ang Subtraction operation
                $result = $num1 - $num2;
                break;
            case 'multiply':
                //gagawin ang Multiplication operation
                $result = $num1 * $num2;
                break;
            case 'divide':
                // Iwasan ang division by zero
                if ($num2 == 0) {
                    $error = "Error: Division by zero is not allowed.";
                } else {
                    // gagawin Division operation
                    $result = $num1 / $num2;
                }
                break;
            default:
                // Error message kung invalid ang operation
                $error = "Invalid operation!";
        }

        // Kung may error, ibalik ang error message bilang pula ang kulay
        if ($error) {
            return "<p style='color: red; font-weight: bold;'>$error</p>";
        }

        // Piliin ang kulay para sa value1 batay sa even o odd
        $valueColor = ($num1 % 2 == 0) ? "orange" : "blue";
        
        // Piliin ang kulay ng background ng result batay sa even o odd
        $bgColor    = ($result % 2 == 0) ? "green" : "blue";

        // Buoin ang HTML output na nagpapakita ng values, operation, at result
        $output = "
            <p>Value 1: <span style='color: $valueColor;'>$num1</span></p>
            <p>Value 2: <span style='color: blue;'>$num2</span></p>
            <p>Operator: $operation</p>
            <p style='background-color: $bgColor; padding: 10px; display: inline-block; color: white;'>
                Result: $result
            </p>
        ";

        // Ibalik ang formatted result bilang HTML string
        return $output;
    }
}