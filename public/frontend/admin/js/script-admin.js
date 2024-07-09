function Alert(){
    setTimeout(() => {
        const alert = document.querySelector(".alert-notification");
        alert.style.display = "none";
    }, 8000);
}

Alert();
