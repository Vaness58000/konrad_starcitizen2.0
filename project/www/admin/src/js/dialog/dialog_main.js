"use strict";
let elementDialog = document.querySelector("#dialog");
let lien_dialog_contenu = "";
let lien_dialog_exec = "";

function recupeId() {
    let id = "";
    document.getElementById("form-contenu").querySelectorAll("[name]").forEach(element => {
        if(element.getAttribute("name").toLocaleLowerCase() == "id") {
            id = element.getAttribute("value");
        }
    });
    return id;
}

function showDialog(name, id, idShow) {
    elementDialog.querySelector("#id-dialog-form").value = id;
    elementDialog.querySelector("#contenu-dialog-form").innerHTML = "";
    let lien_dialog_contenu = "";
    let poss = {id:id, idShow:idShow};
    lien_dialog_contenu = eval('lien_dialog_contenu_'+name);
    lien_dialog_exec = eval('lien_dialog_exec_'+name);
    if(lien_dialog_contenu != undefined && lien_dialog_contenu != "") {
        fetch_post(lien_dialog_contenu, poss).then(function (response) {
            if (response.split("[#CITIZEN-DATE#]")[0] == "true") {
                elementDialog.querySelector("#contenu-dialog-form").innerHTML = response.split("[#CITIZEN-DATE#]")[1];
                icon_inverse();
            } else {
                console.log(response);
                alert(response);
            }
        });
        elementDialog.showModal();
    }
    
}

function validationFormDialog(e) {
    e.preventDefault();
    console.log(form_list("dialog-form"));
    elementDialog.close();
}

function closeDialog(e) {
    e.preventDefault();
    elementDialog.close();
}

if(elementDialog != undefined) {
    document.querySelectorAll(".close-dialog").forEach(element => {
        element.addEventListener("click", closeDialog);
    });
    document.querySelectorAll(".validation-dialog").forEach(element => {
        element.addEventListener("click", validationFormDialog);
    });
}