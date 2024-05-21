// let submit = document.getElementById("submit");

// let reset = document.getElementById("reset");


// submit.onclick = displayEntry;

// function displayEntry() {
//     alert("don't touch")
//     let below = document.createElement("p");
//     below.textContent = "Hello, new div."
//     console.log(below)
// }

// displayEntry;


let click = document.getElementById("touch");
let display = document.getElementById("here")
// let remove = document.getElementById('rem')
click.ontouchmove = myfunction;
// remove.onclick = removeMethod;

function myfunction() {
    display.innerHTML = "Hello"; 
    console.log("Hello")
}

myfunction; 