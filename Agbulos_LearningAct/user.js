console.log("user.js loaded");

let name = "Michael Angelo Obado Agbulos";
let age = "22";
let status = "Single"

let userInformation = `Name: ${name} <br>
                        Age: ${age}<br>
                        Status: ${status}`;

document.getElementById("userInformation").innerHTML = userInformation;