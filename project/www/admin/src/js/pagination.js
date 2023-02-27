"use strict";
function lien_pg() {
    let lien_base = window.location.href.split("#")[0];
    if (lien_base.includes("?")) {
        let liendef = lien_base.split("?")[0];
        let allget = lien_base.split("?")[1];
        let listget = allget.split("&");
        let i = 1;
        listget.forEach(element => {
            if(!element.includes("pg=")) {
                liendef += (i==1) ? "?" : "&";
                liendef += element;
                i++;
            }
        });
        return liendef+"&pg=";
    } else {
        return lien_base+"?pg=";
    }
}
function pagination(lien_pg) {
    let nbpg = document.getElementById("nbpg").value;
    let nmpg = document.getElementById("nmpg").value;
    let pagination = document.getElementById("pagination");
    if(nbpg > 1) {
        for (let index = 1; index <= nbpg; index++) {
            let addPg = document.createElement("a");
            addPg.href = lien_pg+index;
            addPg.innerHTML = index;
            if(index == nmpg) {
                addPg.classList.add("pg-seleted");
                addPg.disabled = true;
                //addPg.setAttribute("disabled","disabled");
            }
            pagination.appendChild(addPg);
        }
    }
}
pagination(lien_pg());
