document.querySelectorAll(".error-load").forEach(element => {
    element.addEventListener("click", function(e){
        let id = element.id.split("-")[1];
        window.location.href = "./?ind=error_msg&id="+id;
    });
});