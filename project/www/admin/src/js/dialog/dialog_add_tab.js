"use strict";

function tab_add_modif(event) {
    event.preventDefault();
    let elementTr = returnTr(event.target);
    let idShow = elementTr.querySelector(".show-id").value;
    showDialog(elementTr.id, idShow);
}

function tab_add_delete(event) {
    event.preventDefault();
    let elementTr = returnTr(event.target);
    let tdName = elementTr.querySelector(".td-name");
    const regex = /<input(.|\n)*?>/i;
    let nameDelet = tdName.innerHTML.replace(regex, '');
    if (window.confirm("Vous voulez vraiment supprimer '"+nameDelet+"' ?\n(Ceci sera définitif).")) {
        let dataId = idDataForm(elementTr.id);
        let isTmp = dataId.tmp;
        let name = dataId.name;
        let id = dataId.id;
        delete_dialog_exec = eval('delete_dialog_exec_'+name);
        let poss = {id:id, id_form_main:id_form_main};
        if(isTmp) {
            let tmpValue = document.getElementById(elementTr.id.replace("idTmp-", "DataTmp-"));
            tmpValue.remove();
            elementTr.remove();
            tableDisplay();
        } else {
            fetch_post(delete_dialog_exec, poss).then(function (response) {
                if(response == "true") {
                    elementTr.remove();
                    tableDisplay();
                } else {
                    alert(response);
                }
            });
        }
    }
}

function tab_add_add(event) {
    event.preventDefault();
    let name = event.target.id.replace('add-', '');
    showDialog(name, 0);
}

document.querySelectorAll(".bt-dialog-add").forEach(element => {
    element.addEventListener("click", tab_add_add);
});

function tab_all_dial_event() {

    document.querySelectorAll(".tab-body-all-dial").forEach(elementTab => {
        elementTab.querySelectorAll(".img-modif").forEach(element => {
            element.addEventListener("click", tab_add_modif);
        });

        elementTab.querySelectorAll(".img-delete").forEach(element => {
            element.addEventListener("click", tab_add_delete);
        });
    });
}

tab_all_dial_event();