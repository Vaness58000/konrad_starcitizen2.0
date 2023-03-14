"use strict";
let elementDialog = document.querySelector("#dialog");
let lien_dialog_contenu = "";
let lien_dialog_exec = "";
let delete_dialog_exec = "";
let validation_dialog_exec = "";
let dataId = { id: 0, name: "", tmp: true, nameId: "" };
let numAddValue = 0;

function showDialog(nameId, idShow) {
  dataId = idDataForm(nameId);
  let isTmp = dataId.tmp;
  let name = dataId.name;
  let id = dataId.id;
  let tabForm = [];
  elementDialog.querySelector("#id-dialog-form").value = id;
  elementDialog.querySelector("#id-form-main").value = id_form_main;
  elementDialog.querySelector("#contenu-dialog-form").innerHTML = "";
  elementDialog.querySelector("#name-show").value = "";
  let lien_dialog_contenu = "";
  let poss = { id: id, idShow: idShow };
  lien_dialog_contenu = eval("lien_dialog_contenu_" + name);
  lien_dialog_exec = eval("lien_dialog_exec_" + name);
  if (dataId.tmp) {
    let tmpValue = document.getElementById(
      dataId.nameId.replace("idTmp-", "DataTmp-")
    );
    tabForm = formToArray(JSON.parse(tmpValue.value));
  }
  if (lien_dialog_contenu != undefined && lien_dialog_contenu != "") {
    fetch_post(lien_dialog_contenu, poss).then(function (response) {
      if (response.split("[#CITIZEN-DATE#]")[0] == "true") {
        elementDialog.querySelector("#contenu-dialog-form").innerHTML =
          response.split("[#CITIZEN-DATE#]")[1];
        if (dataId.tmp) {
            form_list_add("dialog", tabForm);
        }
        icon_inverse();
        elementDialog.showModal();
        imgAllInfo();
      } else {
        alert(response);
      }
    });
  }
}

function tdNameShow(element, nameShow, id = 0) {
    element.innerHTML = nameShow;
    let inputIdShow = document.createElement("input");
    inputIdShow.value = id;
    inputIdShow.setAttribute("type", "hidden");
    inputIdShow.setAttribute("name", "show-id");
    inputIdShow.classList.add("show-id");
    element.appendChild(inputIdShow);
}

function addLineTab(nameShow, id = 0) {
  if (dataId.id == 0) {
    let tabBody = document
      .querySelector("#div-onglet-"+dataId.name)
      .querySelector(".tab-body-all-dial");
    let trOne = tabBody.querySelector("tr");
    let tr = document.createElement("tr");
    if(id_form_main == 0) {
      tr.id = dataId.name + "idTmp-" + numAddValue;
    } else {
      tr.id = dataId.name + "id-" + id;
    }
    let tdName = document.createElement("td");
    tdName.classList.add("td-name");
    tdNameShow(tdName, nameShow, id);
    tr.appendChild(tdName);
    let tdModif = document.createElement("td");
    tdModif.classList.add("td-admin");
    tdModif.classList.add("img-modif");
    let imgModif = document.createElement("img");
    imgModif.src = "./src/images/pencil-fill.svg";
    imgModif.alt = "";
    tdModif.appendChild(imgModif);
    tr.appendChild(tdModif);
    let tdDelte = document.createElement("td");
    tdDelte.classList.add("td-admin");
    tdDelte.classList.add("img-delete");
    let imgDelete = document.createElement("img");
    imgDelete.src = "./src/images/trash3-fill.svg";
    imgDelete.alt = "";
    tdDelte.appendChild(imgDelete);
    tr.appendChild(tdDelte);
    if(trOne == undefined) {
      tabBody.appendChild(tr);
    } else {
      tabBody.insertBefore(tr, trOne)
    }
  } else {
    let tdName = document.getElementById(dataId.nameId).querySelector(".td-name");
    tdNameShow(tdName, nameShow);
  }
  tableDisplay();
}

function validationFormDialog(e) {
      numAddValue++;
  e.preventDefault();
  let nameShow = createNameTd();
  if ((dataId.id == 0 || dataId.tmp) && id_form_main == 0) {
    let formList = form_list("dialog-form");
    let formJson = JSON.stringify(formList);
    if (dataId.id == 0) {
      let formMain = document.getElementById("form-contenu");
      let nameId = dataId.name + "DataTmp-" + numAddValue;
      let input = document.createElement("input");
      input.type = "hidden";
      input.setAttribute("name", nameId);
      input.setAttribute("id", nameId);
      input.value = formJson;
      formMain.appendChild(input);
    } else {
      let tmpValue = document.getElementById(
        dataId.nameId.replace("idTmp-", "DataTmp-")
      );
      tmpValue.value = formJson;
    }
    addLineTab(nameShow);
    elementDialog.close();
    tab_all_dial_event();
  } else {
    fetch_form(lien_dialog_exec, "dialog-form").then(function (response) {
      let recup = response.split("[#CITIZEN-ID#]");
      if(recup[0] == "true") {
        addLineTab(nameShow, recup[1]);
        elementDialog.close();
        tab_all_dial_event();
      } else {
        alert(response);
      }
    });
  }
}

function closeDialog(e) {
  e.preventDefault();
  elementDialog.close();
}

if (elementDialog != undefined) {
  elementDialog.querySelectorAll(".close-dialog").forEach((element) => {
    element.addEventListener("click", closeDialog);
  });
  elementDialog.querySelectorAll(".validation-dialog").forEach((element) => {
    element.addEventListener("click", validationFormDialog);
  });
}
