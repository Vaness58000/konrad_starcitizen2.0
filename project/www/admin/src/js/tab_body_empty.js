"use strict";
let i_tab = 0;
document.querySelectorAll("table").forEach(table => {
    let tbody = document.querySelector(".tab-body-td");
    if(tbody != undefined) {
        let valueTab = tbody.innerHTML;
        if(valueTab.trim() == "") {
            let parentDiv = table.parentNode;
            let tabVide = document.createElement("p");
            tabVide.classList.add("empty-table");
            table.classList.forEach(element => {
                tabVide.classList.add(element);
            });
            tabVide.id = "empty-table-"+i_tab;
            tabVide.innerHTML = "La liste est vide";
            parentDiv.insertBefore(tabVide, table);
            table.remove();
        }
    }
    i_tab++;
});
