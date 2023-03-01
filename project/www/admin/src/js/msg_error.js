document.querySelectorAll("p").forEach(element => {
    if(element.innerHTML == "") {
        element.previousSibling.style.display = "none";
        element.style.display = "none";
    }
});