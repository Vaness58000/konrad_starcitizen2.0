"use strict";
function returnTr(theNode) {
    if(theNode == undefined) {
        return theNode;
    }
    if(theNode.nodeName.toLowerCase() == "tr") {
        return theNode;
    }
    let nodeTr = returnTr(theNode.parentNode);
    if(returnTr(theNode.parentNode) != undefined) {
        return nodeTr;
    }
    return theNode;
}

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

document.querySelectorAll(".img-modif").forEach(element => {
    element.addEventListener("click", tab_add_modif);
});

document.querySelectorAll(".img-delete").forEach(element => {
    element.addEventListener("click", tab_add_delete);
});

document.querySelectorAll(".bt-dialog-add").forEach(element => {
    element.addEventListener("click", tab_add_add);
});