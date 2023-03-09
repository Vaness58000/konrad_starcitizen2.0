"use strict";
//let i_tab = 0;
function tableDisplay() {
    document.querySelectorAll("table").forEach(table => {
        let tbody = table.querySelector(".tab-body-td");
        if(tbody != undefined ) {
            table.parentNode.querySelectorAll(".tb-display-check").forEach(element => {
                element.checked = (tbody.innerHTML.trim() != "");
            });
        }
    });  
}
tableDisplay();
