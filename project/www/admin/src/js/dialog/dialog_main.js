"use strict";
let elementDialog = document.querySelector("#dialog");
lien_dialog_contenu_info = "./src/pages/dialogs/info.php";
lien_dialog_contenu_lieu = "./src/pages/dialogs/lieu.php";
let lien_dialog_contenu = "";
let lien_dialog_exec = "";

function showDialog(name, id) {
    elementDialog.querySelector("#id-dialog-form").value = id;
    elementDialog.querySelector("#contenu-dialog-form").innerHTML = "";
    let lien_dialog_contenu = "";
    let poss = {id:id};
    console.log('lien_dialog_contenu_'+name);
    console.log(lien_dialog_contenu_info);
    lien_dialog_contenu = eval('lien_dialog_contenu_'+name);
    lien_dialog_exec = eval('lien_dialog_exec_'+name);
    if(lien_dialog_contenu != undefined && lien_dialog_contenu != "") {
        fetch_post(lien_dialog_contenu, poss).then(function (response) {
            if (response.split("[#CITIZEN-DATE#]")[0] == "true") {
                elementDialog.querySelector("#contenu-dialog-form").innerHTML = response.split("[#CITIZEN-DATE#]")[1];
                console.log(elementDialog.querySelector("#contenu-dialog-form").innerHTML);
                icon_inverse();
            } else {
                alert(response);
            }
        });
        elementDialog.showModal();
    }
    
}

function validationFormDialog(e) {
    e.preventDefault();
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