"use strict";

function tab_add_modif(event) {
    event.preventDefault();
    let elementTr = returnTr(event.target);
    let idTr = elementTr.id;
    let idShow = elementTr.querySelector(".show-id").value;
    let dataIdTr = idTr.split("id-");
    showDialog(dataIdTr[0], dataIdTr[1], idShow);
}

function tab_add_delete(event) {
    event.preventDefault();
    let elementTr = returnTr(event.target);
    let idTr = elementTr.id;
    let idShow = elementTr.querySelector(".show-id").value;
    let dataIdTr = idTr.split("id-");
    delete_dialog_exec = eval('delete_dialog_exec_'+dataIdTr[0]);
    let poss = {id:dataIdTr[1]};
    fetch_post(delete_dialog_exec, poss).then(function (response) {
        console.log(response);
    });
}

function tab_add_add(event) {
    event.preventDefault();
    let name = event.target.id.replace('add-', '');
    showDialog(name, 0, 0);
}

function tab_all_dial_event() {
    document.querySelectorAll(".tab-body-all-dial").forEach(elementTab => {
        elementTab.querySelectorAll(".img-modif").forEach(element => {
            element.addEventListener("click", tab_add_modif);
        });

        elementTab.querySelectorAll(".img-delete").forEach(element => {
            element.addEventListener("click", tab_add_delete);
        });

        elementTab.querySelectorAll(".bt-dialog-add").forEach(element => {
            element.addEventListener("click", tab_add_add);
        });
    });
}

tab_all_dial_event();