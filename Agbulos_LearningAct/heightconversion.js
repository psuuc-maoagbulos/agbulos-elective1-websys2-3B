console.log("heightconversion.js loaded");

let heightCm = 167;
let heightM = heightCm/100;

let ConvertedHeight =`Height: ${heightCm} cm <br> 
        is equal to ${heightM} m `;

        document.getElementById("Height Conversion").innerHTML = ConvertedHeight;