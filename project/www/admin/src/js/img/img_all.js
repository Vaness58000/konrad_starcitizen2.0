"use strict";
let nb_photo_gener = 0;
let tabIdAllImg = {nameIdAllImg : "add-img", nameFile : "imgFileMainTmp-"};
let tabIdAllImgInf = {nameIdAllImg : "all-img-add", nameFile : "fileImgInfo-"};

function delete_img(e) {
    e.preventDefault();
    if (window.confirm("Vous voulez vraiment supprimer l'image ?\n(Ceci sera définitif).")) {
        let folder_img = recupValueNameForm("#form-contenu", "folder-img");
        let id_img = e.target.parentNode.querySelector(".img-slide-presentation").id;
        let nameAndId = id_img.split("-");
        let tabIdAllImgDef = tabIdAllImg;
        let idName = e.target.parentNode.parentNode.parentNode.querySelector("figure").id;
        let urlDeleteImgDef = urlDeleteImg;
        if(idName == tabIdAllImgInf.nameIdAllImg) {
            tabIdAllImgDef = tabIdAllImgInf;
            urlDeleteImgDef = urlDeleteImgInfp;
        }
        /*let urlDeleteImg = "./src/exec/delete_img_obj.php";
        let urlDeleteImgInfp = "./src/exec/delete_img_obj_info.php";*/
        if(nameAndId[0] === "imgMultiple") {
            e.target.parentNode.parentNode.removeChild(e.target.parentNode);
        } else {
            let poss = { id: nameAndId[1], folder_img: folder_img };
            fetch_post(urlDeleteImgDef, poss).then(function (response) {
                if (response == "true") {
                    e.target.parentNode.parentNode.removeChild(e.target.parentNode);
                } else {
                    console.log(response);
                }
            });
        }
    }
}

function form_delete_click_img() {
    document.querySelectorAll(".delete-image").forEach(element => {
        element.addEventListener("click", delete_img);
    });
}

function addFileImg(file, nameIdAllImg, nameFile) {
    let preview = document.getElementById(nameIdAllImg);
    let addChoiceMain = false;
    if(preview.classList.contains("img-and-main")) {
        addChoiceMain = true;
    }
    let imageType = /^image\//;
    
    if (!imageType.test(file.type)) {
        return;
    }

    let divimg = document.createElement("div");
    divimg.id = "divAddImgTmp-"+nb_photo_gener;
    divimg.classList.add("addimg");
    divimg.classList.add("multiple-img");
    preview.appendChild(divimg);
    
    var img = document.createElement("img");
    img.classList.add("obj");
    img.classList.add("img-slide-presentation");
    img.setAttribute("name","file-"+nb_photo_gener);
    //img.classList.add("drag_img");
    img.id = nameFile+nb_photo_gener;

    //img.setAttribute('draggable', true);
    img.file = file;
    divimg.appendChild(img);

    let detailImg = {
        name : file.name,
        size : file.size,
        type : file.type,
        src : ""
    };

    let imgSrcDel = "./src/images/trash3-fill.svg";
    let imgSrcMain = "./src/images/award-fill.svg";

    var input = document.createElement("input");
    input.type = "hidden";
    input.setAttribute("name",nameFile+nb_photo_gener);
    input.setAttribute("id",nameFile+nb_photo_gener);
    divimg.appendChild(input);

    if(addChoiceMain) {
        var inputPrinc = document.createElement("input");
        inputPrinc.type = "radio";
        inputPrinc.classList.add("img-princ");
        inputPrinc.setAttribute("name","img-princ");
        inputPrinc.setAttribute("id","imgMainTmp-"+nb_photo_gener);
        inputPrinc.setAttribute("value",nameFile+nb_photo_gener);
        divimg.appendChild(inputPrinc);

        var labelImgMain = document.createElement("label");
        labelImgMain.classList.add("img-main");
        labelImgMain.setAttribute("for","imgMainTmp-"+nb_photo_gener);
        divimg.appendChild(labelImgMain);

        var imgMain = document.createElement("img");
        imgMain.src = imgSrcMain;
        labelImgMain.appendChild(imgMain);
    }

    var imgDelete = document.createElement("img");
    imgDelete.classList.add("delete-image");
    imgDelete.classList.add("delete-img");
    imgDelete.classList.add("delete-multiple-img");
    imgDelete.style.position = "absolut";
    imgDelete.id = "delete-img-"+nb_photo_gener;
    imgDelete.src = imgSrcDel;
    divimg.appendChild(imgDelete);

    var reader = new FileReader();
    reader.onload = (function(aImg, detail_img, input_img) {
        return function(e) { 
            aImg.src = e.target.result;
            detail_img.src = e.target.result;
            let json = JSON.stringify(detail_img);
            input_img.setAttribute("value",json);
        };
    })(img, detailImg, input);
    reader.readAsDataURL(file);

    form_delete_click_img();
    nb_photo_gener++;
}

function loadFilesImgAll(event, nameIdAllImg, nameFile) {
    let files = event.target.files;
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var imageType = /^image\//;
    
        if (!imageType.test(file.type)) {
            continue;
        }

        addFileImg(file, nameIdAllImg, nameFile);
    }
}


    function dropHandler(ev) {
        // Prevent default behavior (Prevent file from being opened)
        ev.preventDefault();
        let tabIdAllImgDef = tabIdAllImg;
        let idName = ev.target.parentNode.parentNode.querySelector("figure").id;
        if(idName == tabIdAllImgInf.nameIdAllImg) {
            tabIdAllImgDef = tabIdAllImgInf;
        }
        if (ev.dataTransfer.items) {
        // Use DataTransferItemList interface to access the file(s)
        [...ev.dataTransfer.items].forEach((item, i) => {
            // If dropped items aren't files, reject them
            if (item.kind === 'file') {
            const file = item.getAsFile();
            addFileImg(file, tabIdAllImgDef.nameIdAllImg, tabIdAllImgDef.nameFile);
            }
        });
        } else {
        // Use DataTransfer interface to access the file(s)
        [...ev.dataTransfer.files].forEach((file, i) => {
            console.log(`… file[${i}].name = ${file.name}`);
        });
        }
    }

    function dragOverHandler(ev) {
        // Prevent default behavior (Prevent file from being opened)
        ev.preventDefault();
    }


function deleteImgServ(e, id) {
    console.log(id);
    /* envoyer les informations du message sur la page php a partir d'un formulaire */
    fetch_post(urlDeleteImg, {id:id}).then(function (
        response
     ) {
          /* si c'est bon, on recupere le tableau des valeurs de la liste des messages */
          if (response == "true") {
             location.reload();
             //window.location.href = nameLienModifExec;
          } else {
              alert(response);
          }
     });
}

document.querySelectorAll("#fileToUploadAll").forEach(element => {
    element.addEventListener('change', function(e) {
        loadFilesImgAll(e, tabIdAllImg.nameIdAllImg, tabIdAllImg.nameFile);
    });
    form_delete_click_img();
});

function imgAllInfo() {
    document.querySelectorAll("#fileToUploadAll-add").forEach(element => {
        element.addEventListener('change', function(e) {
            loadFilesImgAll(e, tabIdAllImgInf.nameIdAllImg, tabIdAllImgInf.nameFile);
        });
        form_delete_click_img();
    });

    document.querySelectorAll("#all-img-add").forEach(element => {
        element.addEventListener('drop', dropHandler);
        element.addEventListener('dragover', dragOverHandler);
    });
}

document.querySelectorAll("#img-add").forEach(element => {
    element.addEventListener('drop', dropHandler);
    element.addEventListener('dragover', dragOverHandler);
});

imgAllInfo();
