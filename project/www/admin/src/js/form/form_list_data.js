function form_list(idForm) {
    let tab = [];
    document.getElementById(idForm).querySelectorAll("[name]").forEach(element => {
        tab[element.getAttribute("name")] = (element.value == undefined) ? "" : element.value;
    });
    return tab;
}
/*let tab = form_list("form-contenu");
console.log(tab);
Object.keys(tab).forEach(key => {
    console.log(key+":"+tab[key]);
});*/