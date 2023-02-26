let annuler = document.querySelector("#annuler");
if(annuler != undefined) {
    annuler.addEventListener("click", function(){
        history.back();
    });
}