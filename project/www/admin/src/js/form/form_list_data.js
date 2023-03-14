function form_list(idForm) {
    let tab = [];
    document.getElementById(idForm).querySelectorAll("[name]").forEach(element => {
        let noType = !(element.getAttribute("type") != undefined && element.getAttribute("type").toLocaleLowerCase() == "file");
        if(noType) {
            tab[element.getAttribute("name")] = (element.value == undefined) ? "" : element.value;
        }
    });
    return Object.assign({}, tab);
}

function form_list_add(idForm, tabValues) {
    document.getElementById(idForm).querySelectorAll("[name]").forEach(element => {
        let noType = !(element.getAttribute("type") != undefined && element.getAttribute("type").toLocaleLowerCase() == "file");
        if(noType) {
            for (var key in tabValues){
                var value = tabValues[key];
                if(element.getAttribute("name").toLocaleLowerCase() == key.toLocaleLowerCase()) {
                    if(element.tagName.toLocaleLowerCase() == "textarea") {
                        element.innerHTML = value;
                    } else {
                        element.value = value;
                    }
                }
            }
        }
    });
}

function formToArray(formObj) {
    let formArr = [];
    for (const [key, value] of Object.entries(formObj)) {
        formArr[key] = value;
    }
    return formArr;
}
