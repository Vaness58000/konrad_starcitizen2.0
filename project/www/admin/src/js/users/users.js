"use strict";
urlDeleteImg = "deleteImgObj";
folderImgs = "";
folderImg = "";
folderLogo = "";
add_line_tab = "add_article";
mod_line_tab = "mod_article";
delete_line_tab = "./src/exec/users/delete_user.php";
visibl_line_tab = "visibl_article";

let lien_dialog_contenu_modif_user = "./src/pages/users/modif_user.php";
let lien_dialog_contenu_modif_pass = "./src/pages/users/modif_pass.php";
let lien_dialog_exec_modif_user = "./src/exec/users/modif_user.php";
let lien_dialog_exec_modif_pass = "./src/exec/users/modif_pass.php";
let lien_dialog_exec_modif_role_user = "./src/exec/users/modif_role.php";
let lien_dialog_exec_modif_type_user = "./src/exec/users/modif_type.php";

function modif_role_user(e) {
    e.preventDefault();
    //console.log(e.target);
    e.target.setAttribute("value-old", e.target.value);
}

function modif_type_user(e) {
    e.preventDefault();
    //console.log(e.target);
    e.target.setAttribute("value-old", e.target.value);
}

function modif_user(e) {
    e.preventDefault();
    //console.log(e.target);
    showDialog(lien_dialog_contenu_modif_user, lien_dialog_exec_modif_user);
    e.target.setAttribute("value-old", e.target.value);
}

function modif_pass(e) {
    e.preventDefault();
    //console.log(e.target);
    showDialog(lien_dialog_contenu_modif_pass, lien_dialog_exec_modif_pass);
    e.target.setAttribute("value-old", e.target.value);
}

document.querySelectorAll(".role").forEach(element => {
    element.addEventListener("change", modif_role_user);
});

document.querySelectorAll(".type-user").forEach(element => {
    element.addEventListener("change", modif_type_user);
});

document.querySelectorAll(".img-modif-user").forEach(element => {
    element.addEventListener("click", modif_user);
});

document.querySelectorAll(".modif-user").forEach(element => {
    element.addEventListener("click", modif_user);
});

document.querySelectorAll(".modif-pass").forEach(element => {
    element.addEventListener("click", modif_pass);
});

