"use strict";
// ctrl + c + k to comment out
// ctrl + c + k to uncomment out


function activateZara(){
    const zaraInput = document.getElementById("zara-input")
    const aqabaInput = document.getElementById("aqaba-input")
    const pelaInput = document.getElementById("pela-input")
    const rumInput = document.getElementById("rum-input")
    if(zaraInput.classList.contains("invisible")){
        zaraInput.classList.add("visible")
        zaraInput.classList.remove("invisible")
        pelaInput.classList.remove("visible")
        pelaInput.classList.add("invisible")
        aqabaInput.classList.remove("visible")
        aqabaInput.classList.add("invisible")
        rumInput.classList.remove("visible")
        rumInput.classList.add("invisible")
    }else{           
        zaraInput.classList.remove("visible")
        zaraInput.classList.add("invisible")
    }
}

function activateAqaba(){
    const zaraInput = document.getElementById("zara-input")
    const aqabaInput = document.getElementById("aqaba-input")
    const pelaInput = document.getElementById("pela-input")
    const rumInput = document.getElementById("rum-input")
    if(aqabaInput.classList.contains("invisible")){
        aqabaInput.classList.add("visible")
        aqabaInput.classList.remove("invisible")
        pelaInput.classList.remove("visible")
        pelaInput.classList.add("invisible")
        zaraInput.classList.remove("visible")
        zaraInput.classList.add("invisible")
        rumInput.classList.remove("visible")
        rumInput.classList.add("invisible")
    }else{           
        aqabaInput.classList.remove("visible")
        aqabaInput.classList.add("invisible")
    }
}

function activatePela(){
    const zaraInput = document.getElementById("zara-input")
    const aqabaInput = document.getElementById("aqaba-input")
    const pelaInput = document.getElementById("pela-input")
    const rumInput = document.getElementById("rum-input")
    if(pelaInput.classList.contains("invisible")){
        pelaInput.classList.add("visible")
        pelaInput.classList.remove("invisible")
        aqabaInput.classList.remove("visible")
        aqabaInput.classList.add("invisible")
        zaraInput.classList.remove("visible")
        zaraInput.classList.add("invisible")
        rumInput.classList.remove("visible")
        rumInput.classList.add("invisible")
    }else{           
        pelaInput.classList.remove("visible")
        pelaInput.classList.add("invisible")
    }
}

function activateRum(){
    const zaraInput = document.getElementById("zara-input")
    const aqabaInput = document.getElementById("aqaba-input")
    const pelaInput = document.getElementById("pela-input")
    const rumInput = document.getElementById("rum-input")
    if(rumInput.classList.contains("invisible")){
        rumInput.classList.add("visible")
        rumInput.classList.remove("invisible")
        aqabaInput.classList.remove("visible")
        aqabaInput.classList.add("invisible")
        zaraInput.classList.remove("visible")
        zaraInput.classList.add("invisible")
        pelaInput.classList.remove("visible")
        pelaInput.classList.add("invisible")
    }else{           
        rumInput.classList.remove("visible")
        rumInput.classList.add("invisible")
    }
}
