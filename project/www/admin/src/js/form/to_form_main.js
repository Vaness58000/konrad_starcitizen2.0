"use strict";
function add_form_validation(event) {
    event.preventDefault();
    /* envoyer les informations du message sur la page php a partir d'un formulaire */
    fetch_form(add_exec_tab, "form-contenu").then(function (
       response
    ) {
        /*let value = response.split("[#sepJson#]");
         / * si c'est bon, on recupere le tableau des valeurs de la liste des messages * /
         if (value[0] == "true") {
            console.log(JSON.parse(value[1]));
         } else {*/
             console.log(response);
         //}
    });
}

function add_form_annuler(event) {
    event.preventDefault();
    history.back();
}

document.querySelectorAll("#validation-form").forEach(element => {
    element.addEventListener("click", add_form_validation);
});

document.querySelectorAll("#annuler-form").forEach(element => {
    element.addEventListener("click", add_form_annuler);
});
