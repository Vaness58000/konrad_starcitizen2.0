"use strict";
/*let nb_photo_gener = 0;

function delete_img(e) {
    let id_img = e.target.parentNode.querySelector("img").id;
    let nameAndId = id_img.split("_");
    if(nameAndId[0] === "imgMultiple") {
        e.target.parentNode.parentNode.removeChild(e.target.parentNode);
    } else {
        deleteImgServ(e, nameAndId[1]);
    }
    
}

function form_delete_click_img() {
    document.querySelectorAll(".delete_image").forEach(element => {
        element.addEventListener("click", delete_img);
    });
}

function addFileImg(file) {
    let preview = document.getElementById("add_img");
    let imageType = /^image\//;
    
    if (!imageType.test(file.type)) {
        return;
    }

    let divimg = document.createElement("div");
    divimg.id = "divAddImg_"+nb_photo_gener;
    divimg.classList.add("addimg");
    divimg.classList.add("multiple-img");
    preview.appendChild(divimg);
    
    var img = document.createElement("img");
    img.classList.add("obj");
    img.classList.add("img-slide-presentation");
    img.setAttribute("name","file_"+nb_photo_gener);
    //img.classList.add("drag_img");
    img.id = "imgMultiple_"+nb_photo_gener;

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

    var imgDelete = document.createElement("img");
    imgDelete.classList.add("delete_image");
    imgDelete.classList.add("delete_img");
    imgDelete.classList.add("delete-multiple-img");
    imgDelete.style.position = "absolut";
    imgDelete.id = "delete_img_"+nb_photo_gener;
    imgDelete.src = imgSrcDel;
    divimg.appendChild(imgDelete);

    var input = document.createElement("input");
    input.type = "hidden";
    input.setAttribute("name","file_"+nb_photo_gener);
    input.setAttribute("id","file_"+nb_photo_gener);
    divimg.appendChild(input);

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

function loadFilesImgAll(event) {
    let files = event.target.files;
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var imageType = /^image\//;
    
        if (!imageType.test(file.type)) {
            continue;
        }

        addFileImg(file);
    }
}

function dropHandler(ev) {
    // Prevent default behavior (Prevent file from being opened)
    ev.preventDefault();
  
    if (ev.dataTransfer.items) {
      // Use DataTransferItemList interface to access the file(s)
      [...ev.dataTransfer.items].forEach((item, i) => {
        // If dropped items aren't files, reject them
        if (item.kind === 'file') {
          const file = item.getAsFile();
          addFileImg(file);
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
    // envoyer les informations du message sur la page php a partir d'un formulaire
    fetch_post(urlDeleteImg, {id:id}).then(function (
        response
     ) {
          // si c'est bon, on recupere le tableau des valeurs de la liste des messages
          if (response == "true") {
             location.reload();
             //window.location.href = nameLienModifExec;
          } else {
              alert(response);
          }
     });
}

document.querySelectorAll("#fileToUploadAll").forEach(element => {
    element.addEventListener('change', loadFilesImgAll);
    form_delete_click_img();
});

document.querySelectorAll("#img-add").forEach(element => {
    element.addEventListener('drop', dropHandler);
    element.addEventListener('dragover', dragOverHandler);
});
*/