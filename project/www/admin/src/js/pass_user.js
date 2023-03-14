"use strict";
// <i class="pass-eye fa-sharp fa-solid fa-eye"></i><!--<i class="fa-solid fa-eye-slash"></i>
function passToggle() {
    document.querySelectorAll(".pass-eye").forEach(element => {
        element.addEventListener("click", function (e) {
            e.preventDefault();
            e.target.classList.toggle("fa-eye");
            e.target.classList.toggle("fa-eye-slash");
            if(e.target.classList.contains("fa-eye")) {
                e.target.parentNode.querySelector(".input-pass").type = "text";
            } else {
                e.target.parentNode.querySelector(".input-pass").type = "password";
            }
            //input-pass
        })
    });
}