"use strict";
let elementDialogUser = document.querySelector("#dialog-user");
let id_user = 0;

function showDialog(lien_dialog_contenu) {
  let poss = { id: 0 };
  if (lien_dialog_contenu != undefined && lien_dialog_contenu != "") {
    fetch_post(lien_dialog_contenu, poss).then(function (response) {
      if (response.split("[#CITIZEN-DATE#]")[0] == "true") {
        elementDialogUser.querySelector("#contenu-dialog-form-user").innerHTML = response.split("[#CITIZEN-DATE#]")[1];
        passToggle();
        imgFile(document.getElementById("file-img"), document.getElementById("img-add"), false);
        elementDialogUser.showModal();
        imgAllInfo();
    } else {
      alert(response);
    }
    });
  }
}

function validDialUser(e) {
  e.preventDefault();
}

function closeDialogUser(e) {
  e.preventDefault();
  elementDialogUser.close();
}

if (elementDialogUser != undefined) {
  elementDialogUser.querySelectorAll(".close-dialog").forEach((element) => {
    element.addEventListener("click", closeDialogUser);
  });
  elementDialogUser.querySelectorAll(".validation-dialog").forEach((element) => {
    element.addEventListener("click", validDialUser);
  });
}
