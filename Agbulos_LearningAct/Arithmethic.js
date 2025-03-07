console.log("Arithmethic.js loaded");


let x = 9;
let y= 11;

let sum = x+y;
let difference = x-y;
let product = x*y;
let quotient = x/y;

let OverAllResult = `First number: ${x} <br>
                    Second number: ${y}<br> <br>
    
    Sum: ${sum}<br>
    Difference: ${difference}<br>
    Product: ${product}<br>
    Quotient: ${quotient} `;

    document.getElementById("OverAllResult").innerHTML = OverAllResult;