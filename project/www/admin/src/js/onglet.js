"use strict";
let onglet = document.querySelector("#onglets");
if (onglet != undefined) {
  onglet.querySelectorAll("li").forEach((element) => {
    element.addEventListener("click", function (e) {
      e.preventDefault();
      document.getElementById(
        element.querySelector("label").getAttribute("for")
      ).checked = true;
    });
  });
}
