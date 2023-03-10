"use strict";
let tab_add_info = {};
let tab_add_force = {};
let tab_add_faibl = {};
let tab_add_equip = {};
let tab_add_arm = {};
let tab_add_lieu = {};
let tab_add_diplom = {};
let tab_add_contro = {};
let tab_add_gplayType = {};

let urlDeleteImg = "./src/exec/delete_img_obj.php";
let urlDeleteImgInfp = "./src/exec/delete_img_obj_info.php";
let folderImgs = "";
let folderImg = "";
let folderLogo = "";
let add_exec_tab = "";
let add_line_tab = "";
let mod_line_tab = "";
let delete_line_tab = "";
let visibl_line_tab = "";

let lien_dialog_contenu_lieu_arm = "./src/pages/dialogs/lieuArm.php";
let lien_dialog_contenu_info = "./src/pages/dialogs/info.php";
let lien_dialog_contenu_force = "./src/pages/dialogs/force.php";
let lien_dialog_contenu_faibl = "./src/pages/dialogs/faibl.php";
let lien_dialog_contenu_equip = "./src/pages/dialogs/equipem.php";
let lien_dialog_contenu_arm = "./src/pages/dialogs/transpArm.php";
let lien_dialog_contenu_lieu = "./src/pages/dialogs/lieu.php";
let lien_dialog_contenu_diplom = "./src/pages/dialogs/diplom.php";
let lien_dialog_contenu_contro = "./src/pages/dialogs/lieu.php";
let lien_dialog_contenu_gplayType = "./src/pages/dialogs/gplay.php";
let lien_dialog_exec_info = "./src/exec/dialogs/add_mod_info.php";
let lien_dialog_exec_force = "./src/exec/dialogs/add_mod_force.php";
let lien_dialog_exec_faibl = "./src/exec/dialogs/add_mod_faibl.php";
let lien_dialog_exec_equip = "./src/exec/dialogs/add_mod_equipem.php";
let lien_dialog_exec_arm = "./src/exec/dialogs/add_mod_transpArm.php";
let lien_dialog_exec_lieu = "";
let lien_dialog_exec_diplom = "./src/exec/dialogs/add_mod_diplom.php";
let lien_dialog_exec_contro = "./src/exec/dialogs/add_mod_control.php";
let lien_dialog_exec_gplayType = "./src/exec/dialogs/add_mod_gplay.php";
let delete_dialog_exec_info = "./src/exec/dialogs/delete_info.php";
let delete_dialog_exec_force = "./src/exec/dialogs/delete_force.php";
let delete_dialog_exec_faibl = "./src/exec/dialogs/delete_faibl.php";
let delete_dialog_exec_equip = "./src/exec/dialogs/delete_equipem.php";
let delete_dialog_exec_arm = "./src/exec/dialogs/delete_transpArm.php";
let delete_dialog_exec_lieu = "";
let delete_dialog_exec_diplom = "./src/exec/dialogs/delete_diplom.php";
let delete_dialog_exec_contro = "./src/exec/dialogs/delete_control.php";
let delete_dialog_exec_gplayType = "./src/exec/dialogs/delete_gplay.php";


function recupValueNameForm(nameForm, name) {
    let value = "";
    document.querySelectorAll(nameForm).forEach(element => {
        element.querySelectorAll("[name]").forEach(elementId => {
            if(elementId.getAttribute("name").toLocaleLowerCase() == name.toLocaleLowerCase()) {
                value = elementId.value;
            }
        });
    });
    return value;
}

function recupId(nameForm) {
    return recupValueNameForm(nameForm, "id");
}

function idDataForm(idName) {
    let dataAll = {id:0, name:"", tmp:false, nameId:idName};
    idName = idName.replace('idTmp-', 'Tmp-');
    idName = idName.replace('id-', '-');
    dataAll.tmp = idName.includes("Tmp-");
    let separateur = dataAll.tmp ? "Tmp-" : "-";
    let data = idName.split(separateur);
    dataAll.name = data[0];
    if(data.length > 1) {
        dataAll.id = data[1];
    }
    return dataAll;
}

let id_form_main = recupId("#form-contenu");
