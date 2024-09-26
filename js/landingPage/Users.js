let numeroStats = document.getElementById("numberStat__users"); 
let trainerStats = document.getElementById("numberStat__trainers"); 
let rutineStats = document.getElementById("numberStat__rutines"); 
let dietsStats = document.getElementById("numberStat__diets"); 

function animarNumero1(numero){
    console.log("corriendo")
    let valorActual = 0; 

    let intervalo = setInterval(function() {

        if(valorActual < numero){
            valorActual += 1;
            numeroStats.textContent = "+" + valorActual;
        }

    
        else {
            clearInterval(intervalo);
        }
    }, 10 ); 
}

function animarNumero2(numero){
    console.log("corriendo")
    let valorActual = 0; 

    let intervalo = setInterval(function() {

        if(valorActual < numero){
            valorActual += 1;
            trainerStats.textContent = "+" + valorActual;
        }

    
        else {
            clearInterval(intervalo);
        }
    }, 10 ); 
}

function animarNumero3(numero){
    console.log("corriendo")
    let valorActual = 0; 

    let intervalo = setInterval(function() {

        if(valorActual < numero){
            valorActual += 1;
            rutineStats.textContent = "+" + valorActual;
        }

    
        else {
            clearInterval(intervalo);
        }
    }, 10 ); 
}

function animarNumero4(numero){
    console.log("corriendo")
    let valorActual = 0; 

    let intervalo = setInterval(function() {

        if(valorActual < numero){
            valorActual += 1;
            dietsStats.textContent = "+" + valorActual;
        }

    
        else {
            clearInterval(intervalo);
        }
    }, 10 ); 
}


animarNumero1(62); 
animarNumero2(37); 
animarNumero3(167); 
animarNumero4(111); 