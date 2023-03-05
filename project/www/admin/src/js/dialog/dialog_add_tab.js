"use strict";

function tab_add_modif(event) {
    event.preventDefault();
    let elementTr = returnTr(event.target);
    let idTr = elementTr.id;
    let idShow = elementTr.querySelector(".show-id").value;
    let dataIdTr = idTr.split("id-");
    showDialog(dataIdTr[0], dataIdTr[1], idShow);
    //document.querySelector("#dialog-"+dataIdTr[0]).showModal();
    //console.log(dataIdTr);
}

function tab_add_delete(event) {
    event.preventDefault();
    let elementTr = returnTr(event.target);
    let idTr = elementTr.id;
    let idShow = elementTr.querySelector(".show-id").value;
    let dataIdTr = idTr.split("id-");
    console.log(dataIdTr);
}

function tab_add_add(event) {
    event.preventDefault();
    let name = event.target.id.replace('add-', '');
    showDialog(name, 0, 0);
    //console.log(name);
    //document.querySelector("#dialog"+name).showModal();
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