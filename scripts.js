function copyCode() {
    navigator.clipboard.writeText("251773").then(() => {
        alert("Código copiado al portapapeles");
    });
}

function copyLink() {
    var link = document.getElementById("refLink");
    link.select();
    document.execCommand("copy");
    alert("Enlace copiado al portapapeles");
}

function navigateTo(page) {
    alert("Navegar a " + page);
    // Aquí puedes agregar la funcionalidad para navegar a diferentes páginas
}