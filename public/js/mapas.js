document.addEventListener("DOMContentLoaded", function () {
    setInterval(function () {
        fetch('/mapas/actualizar')
            .then(response => console.log("Datos actualizados"))
            .catch(error => console.error("Error en la actualización:", error));
    }, 600000); // Se ejecuta cada 10 minutos
});
