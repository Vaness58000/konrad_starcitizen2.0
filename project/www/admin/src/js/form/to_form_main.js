"use strict";
function add_form_validation(event) {
    event.preventDefault();
    /* envoyer les informations du message sur la page php a partir d'un formulaire */
    fetch_form(add_exec_tab, "form-contenu").then(function (
       response
    ) {
        if (response == "true") {
            document.referrer ? window.location = document.referrer : history.back();
        } else {
            alert(response);
        }
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

