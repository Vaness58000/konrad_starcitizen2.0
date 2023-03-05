"use strict";
function icon_inverse() {
    document.querySelectorAll(".img-add").forEach(element => {
        let src = element.src;
        element.style.filter = "unset";
        element.style.width = "unset";
        element.style.height = "unset";
        if(src.includes("src/images") && !src.includes("data:image")) {
            element.style.filter = "invert(1)";
            element.style.width = "150px";
            element.style.height = "150px";
        }
    });
}

icon_inverse();