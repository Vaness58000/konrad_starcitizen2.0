document.querySelectorAll(".img-add").forEach(element => {
    let src = element.src;
    if(src.includes("src/images")) {
        element.style.filter = "invert(1)";
        element.style.width = "150px";
        element.style.height = "150px";
    }
});