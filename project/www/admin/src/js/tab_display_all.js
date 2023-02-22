"use strict";
document.getElementById("tab-body-all").querySelectorAll(".img-visib").forEach(element => {
    element.addEventListener("click", function(event) {
        event.preventDefault();
        let id = element.parentNode.id.split("-")[1];
        alert("visibled : "+id);
    })
});
document.getElementById("tab-body-all").querySelectorAll(".img-modif").forEach(element => {
    element.addEventListener("click", function(event) {
        event.preventDefault();
        let id = element.parentNode.id.split("-")[1];
        window.location.href = "./?ind="+mod_line_tab+"&id="+id;
    })
});
document.getElementById("tab-body-all").querySelectorAll(".img-delete").forEach(element => {
    element.addEventListener("click", function(event) {
        event.preventDefault();
        let id = element.parentNode.id.split("-")[1];
        alert("delete : "+id);
    })
});
document.getElementById("add-tab").addEventListener("click", function(event) {
    event.preventDefault();
    window.location.href = "./?ind="+add_line_tab;
})
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
