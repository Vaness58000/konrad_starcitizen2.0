"use strict";

function tab_modif(event) {
    event.preventDefault();
    let id = returnTr(event.target).id.split("-")[1];
    window.location.href = "./?ind="+mod_line_tab+"&id="+id;
}

function tab_delete(event) {
    event.preventDefault();
    let folder_img = document.getElementById("folder-img") == undefined ? "" : document.getElementById("folder-img").value;
    let trTabeLine = returnTr(event.target);
    let tdName = trTabeLine.querySelector(".td-name");
    if (window.confirm("Vous voulez vraiment supprimer '"+tdName.innerHTML+"' ?\n(Ceci sera définitif).")) {
        let id = returnTr(event.target).id.split("-")[1];
        let poss = {id:id, folder_img:folder_img};
        fetch_post(delete_line_tab, poss).then(function (response) {
            if (response == "true") {
                trTabeLine.remove();
            } else {
                alert(response);
            }
        });
    }
}

function tab_visible(event) {
    //event.preventDefault();
    let trElement = returnTr(event.target);
    let id = trElement.id.split("-")[1];
    let checkElement = trElement.querySelector(".darkSwitch");
    let checkedValue = checkElement.checked;
    let poss = {id:id, check:checkedValue};
    fetch_post(visibl_line_tab, poss).then(function (response) {
        if (response != "true") {
            checkElement.checked = !checkedValue;
            alert(response);
        }
    });
}

function tab_all_event() {
    let tab_body_all = document.getElementById("tab-body-all");
    if(tab_body_all != undefined) {
        tab_body_all.querySelectorAll(".img-visib").forEach(element => {
            element.addEventListener("click", tab_visible);
        });
        tab_body_all.querySelectorAll(".img-modif").forEach(element => {
            element.addEventListener("click", tab_modif);
        });
        tab_body_all.querySelectorAll(".img-delete").forEach(element => {
            element.addEventListener("click", tab_delete);
        });
    }
    let add_tab = document.getElementById("add-tab");
    if(add_tab != undefined) {
        add_tab.addEventListener("click", function(event) {
            event.preventDefault();
            window.location.href = "./?ind="+add_line_tab;
        });
    }
}

tab_all_event();
/*let valueTab = document.getElementById("tab-body-all").innerHTML;
if(valueTab.trim() == "") {
    let parentDiv = document.getElementById("tab-all").parentNode;
    let tab = document.getElementById("tab-all")
    let tabVide = document.createElement("p");
    tabVide.innerHTML = "La liste est vide";
    tabVide.id = "empty-table";
    parentDiv.insertBefore(tabVide, tab);
    tab.remove();
}*/
