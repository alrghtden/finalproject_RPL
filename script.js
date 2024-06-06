function showForm(type) {
    var kehilanganForm = document.getElementById("formKehilangan");
    var temuanForm = document.getElementById("formTemuan");
    var btnKehilangan = document.getElementById("btnKehilangan");
    var btnTemuan = document.getElementById("btnTemuan");

    if (type === 'kehilangan') {
        kehilanganForm.style.display = "block";
        temuanForm.style.display = "none";
        btnKehilangan.classList.add("active");
        btnTemuan.classList.remove("active");
    } else {
        kehilanganForm.style.display = "none";
        temuanForm.style.display = "block";
        btnKehilangan.classList.remove("active");
        btnTemuan.classList.add("active");
    }
}