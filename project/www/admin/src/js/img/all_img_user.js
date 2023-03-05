"use strict";
document.querySelectorAll(".delete_img").forEach(element => {
    element.addEventListener("click", function(event) {
        event.preventDefault();
        let id = element.parentNode.id.split("-")[1];
        alert("delete img : "+id);
    })
});