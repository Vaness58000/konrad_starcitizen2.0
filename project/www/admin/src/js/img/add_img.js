"use strict";
/*
Recuperation d'une image pour l'afficher sur le html
event (event) : evenement d'ecoute
*/
function loadFiles(event, idImg) {
    event.preventDefault();
    // on recupere la liste des fichiers
    let files = event.target.files;
    // Ou visualiser l'image qui sera telecharge
    let preview = idImg;
    // une boucle sur les fichiers telecharges
    for (var i = 0; i < files.length; i++) {
        // recuperation du fichier
        var file = files[i];
        // le type du fichier
        var imageType = /^image\//;
  
        // verifier qu'on a bien une image, sinon on n'affiche rien.
        if (!imageType.test(file.type)) {
            continue;
        }

        // on vide l'image par defaut et on ajoute le fichier
        preview.src = "";
        preview.file = file;

        // ici on affiche l'image sur la page html (ne surtout pas le supprimer).
        var reader = new FileReader();
        reader.onload = (function(aImg) {
            return function(e) { 
                aImg.src = e.target.result;
                };
        })(preview);
        reader.readAsDataURL(file);
    }
}

function imgFile(file, img) {
    if(file != undefined && img != undefined) {
        file.addEventListener('change', function(e) {
            loadFiles(e, img);
            icon_inverse();
        });
    }
    
}

imgFile(document.getElementById("file-logo"), document.getElementById("img-logo"));
imgFile(document.getElementById("file-img"), document.getElementById("img-add"));
