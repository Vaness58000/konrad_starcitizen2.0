"use strict";
let admin_menu = document.getElementById("admin_menu");
let wrapper_menu = document.querySelector(".wrapper_menu");
function resize() {
    let heightWindow = window.innerHeight;
    if(admin_menu != undefined && wrapper_menu != undefined) {
        let heightMenu = wrapper_menu.clientHeight;
        admin_menu.style.height = (heightWindow-heightMenu)+"px";
    }
}
resize();
window.onresize = resize;