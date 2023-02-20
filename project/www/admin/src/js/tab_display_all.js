"use strict";
document.getElementById("tab_articles").querySelectorAll(".img-visib").forEach(element => {
    element.addEventListener("click", function(event) {
        event.preventDefault();
        let id = element.parentNode.id.split("-")[1];
        alert("visibled : "+id);
    })
});
document.getElementById("tab_articles").querySelectorAll(".img-modif").forEach(element => {
    element.addEventListener("click", function(event) {
        event.preventDefault();
        let id = element.parentNode.id.split("-")[1];
        window.location.href = "./?ind="+mod_line_tab+"&id="+id;
    })
});
document.getElementById("tab_articles").querySelectorAll(".img-delete").forEach(element => {
    element.addEventListener("click", function(event) {
        event.preventDefault();
        let id = element.parentNode.id.split("-")[1];
        alert("delete : "+id);
    })
});