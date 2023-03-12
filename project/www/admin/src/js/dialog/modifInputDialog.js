"use strict";
function createNameTd() {
    let nameShow = "";
    let nomElement = document.getElementById("dialog-nom");
    let faiblElement = document.getElementById("dialog-faibl-select");
    let forceElement = document.getElementById("dialog-force-select");
    let gplayElement = document.getElementById("dialog-gplay-select");
    let armTranspElement = document.getElementById("dialog-arm-select");
    let lieuElement = document.getElementById("dialog-lieu-select");
    let couleurElement = document.getElementById("dialog-couleur-select");
    if(nomElement != undefined) {
        nameShow = nomElement.value;
    }
    if(faiblElement != undefined) {
        nameShow = faiblElement.options[faiblElement.selectedIndex].innerHTML;
    }
    if(forceElement != undefined) {
        nameShow = forceElement.options[forceElement.selectedIndex].innerHTML;
    }
    if(gplayElement != undefined) {
        nameShow = gplayElement.options[gplayElement.selectedIndex].innerHTML;
    }
    if(armTranspElement != undefined) {
        nameShow = armTranspElement.options[armTranspElement.selectedIndex].innerHTML;
    }
    if(lieuElement != undefined) {
        nameShow = lieuElement.options[lieuElement.selectedIndex].innerHTML;
    }
    if(lieuElement != undefined && couleurElement != undefined) {
        nameShow = lieuElement.options[lieuElement.selectedIndex].innerHTML+" / "+couleurElement.options[couleurElement.selectedIndex].innerHTML;
    }
    return nameShow;
}