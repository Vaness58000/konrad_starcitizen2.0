"use strict";
let annuler = document.querySelector("#annuler");
if(annuler != undefined) {
    annuler.addEventListener("click", function(event){
        event.preventDefault();
        history.back();
    });
}