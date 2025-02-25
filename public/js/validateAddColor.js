document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('form');
    const nameInput = document.querySelector('input[name="name"]');

    form.addEventListener("submit", function (event) {
        const nameValue = nameInput.value.trim();
        const regex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/; // Permite letras y espacios

        if (!regex.test(nameValue)) {
            event.preventDefault();
            
            swal({
                title: "Error",
                text: "El nombre solo puede contener letras y espacios.",
                type: "error",
                confirmButtonText: "Aceptar"
            });

            nameInput.focus();
        }
    });
});